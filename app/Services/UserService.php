<?php
namespace App\Services;

use App\Events\LoginEvent;
use App\Events\RegisterEvent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;
use Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class UserService {

    protected $guard = 'api';
    protected $username = 'username';

    /**
     * 获取单个会员信息
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function findUser ($id) {
        return User::find($id);
    }


    /**
     * 获取分页列表
     *
     */
    public function pageList (Request $request) {
        $model = User::orderBy('created_at', 'desc');

        // parseCondition
        $this->parseCondition($request, $model);

        $list = $model->paginate($request->get('page_size', 10));
        return $list;
    }


    /**
     * 转换查询条件
     *
     */
    private function parseCondition (Request $request, &$model) {
        $username = trim($request->get('username', ''));
        if(!empty($username)){
            $model = $model->where('username', 'like', '%'.$username.'%');
        }

        $phone = trim($request->get('phone', ''));
        if(!empty($phone)){
            $model = $model->where('phone', $phone);
        }

        $email = trim($request->get('email', ''));
        if(!empty($email)){
            $model = $model->where('email', $email);
        }

        $register_type = trim($request->get('register_type', ''));
        if(!empty($register_type)){
            $model = $model->where('register_type', $register_type);
        }

        $last_login = $request->get('last_login');
        if(!empty($last_login)){
            $model = $model->whereBetween('last_login', [$last_login[0], $last_login[1]]);
        }

        $created_at = $request->get('created_at');
        if(!empty($created_at)){
            $model = $model->whereBetween('created_at', [$created_at[0], $created_at[1]]);
        }
    }


    /**
     * 快速设置某个字段的值
     *
     * @param Request $request
     * @return mixed
     */
    public function setField (Request $request){
        $model = User::find($request->get('tv_id'));

        $field = $request->get('field');
        $value = $request->get('value', '');
        $model->$field = $value;

        try {
            return $model->save();
        } catch (\Exception $e) {
            logger($e->getMessage());
            return false;
        }
    }


    /**
     * 修改会员
     *
     * @param Request $request
     * @return bool
     */
    public function updateUser ($fields) {
        $validBack = $this->valid($fields);
        if(! $validBack['state']){ return output_error($validBack['error']); }

        try {
            $model = User::findOrFail($fields['user_id']);

            $model->avatar = trim($fields['avatar']);
            if( isset($fields['password']) ){ $model->password = bcrypt(trim($fields['password'])); }
            if( isset($fields['email']) ){ $model->email = trim($fields['email']); }
            if( isset($fields['phone']) ){ $model->phone = trim($fields['phone']); }

            return $model->save();
        } catch(\Exception $e){
            return false;
        }
    }


    /**
     * 将会员放入回收站
     *
     * @param $id
     * @return int
     */
    public function destoryUser ($id) {
        return User::destroy($id);
    }


    /**
     * 将会员永久删除
     *
     * @param $id
     * @return int
     */
    public function deleteUser ($id) {
        // $tvModel = User::find($id);
        // return User::forceDelete($id);
    }


    /**
     * 会员登陆
     *
     * @param $request
     * @return array
     */
    public function login ($request) {
        $username = $request['username'];
        $password = $request['password'];
        $loginType = 'username';
        if(isMobile($username)) {
            $loginType = 'phone';
        }elseif(isEmail($username)){
            $loginType = 'email';
        }

        if ($token = Auth::guard($this->guard)->attempt([ $loginType => $username, 'password' => $password ])) {
            // 登陆事件
            event(new LoginEvent($token));

            return output_data($token);
        }

        return output_error('用户名密码错误');
    }


    /**
     * 会员注册
     *
     * @param $form
     * @return array
     */
    public function register ($form) {
        $validBack = $this->valid($form);
        if(! $validBack['state']){ return output_error($validBack['error']); }

        try {
            DB::beginTransaction();
            $user = User::create([
                'username' => trim($form['username']),
                'password' => bcrypt(trim($form['password'])),
                'avatar' => isset($form['avatar']) ? trim($form['avatar']) : '',
                'email' => isset($form['email']) ? trim($form['email']) : '',
                'phone' => isset($form['phone']) ? trim($form['phone']) : '',
                'login_num' => 1,
                'last_login' => Carbon::now(),
                'last_ip' => request()->getClientIp(),
                'register_ip' => request()->getClientIp(),
                'register_time' => Carbon::now(),
                'register_type' => isset($form['register_type']) ? trim($form['register_type']) : ''
            ]);
            DB::commit();

            // 注册事件
            event(new RegisterEvent($user));

            return output_data($user);
        } catch(\Exception $e){
            // dd($e->getMessage());
            DB::rollBack();
            return output_error('register error');
        }
    }


    /**
     * 插入或更新数据时，验证字段
     *
     * @param Request $request
     * @return array
     */
    private function valid($formFields) {
        $validArr = [ 'state' => true, 'error' => '' ];

        $user_id = empty($formFields['user_id']) ? 0 : $formFields['user_id'];

        $validator = Validator::make($formFields, [
            'username' => 'required|min:3|max:20|unique:user,username,'.$user_id.',user_id',
            'password' => 'between:5,30',
            'email' => 'email'.(!empty($formFields['email']) ? '|unique:user,email,'.$user_id.',user_id' : ''),
            'phone' => 'mobile'.(!empty($formFields['phone']) ? '|unique:user,phone,'.$user_id.',user_id' : '')
        ], [
            'username.required' => '用户名必填!',
            'username.min' => '用户名最少3个字符',
            'username.max' => '用户名不得超过20个字符',
            'username.unique' => '用户名已存在',
            'password.between' => '密码长度必须为5-30个字符!',
            'email.email' => '邮箱格式错误!',
            'email.unique' => '邮箱已存在',
            'phone.mobile' => '手机格式错误!',
            'phone.unique' => '手机号已存在'
        ]);

        if ($validator->fails()) {
            $validArr['state'] = false;
            $validArr['error'] = $validator->errors()->first();
        }
        return $validArr;
    }


    public function getUserOfAccount ($account) {
        $column = '';
        if( isEmail($account) ){
            $column = 'email';
        }else if( isMobile($account) ) {
            $column = 'phone';
        }else{
            return null;
        }

        return User::where($column, $account)->first();
    }
}