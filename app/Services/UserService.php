<?php
namespace App\Services;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class UserService {

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
     * 添加影视
     *
     * @param Request $request
     * @return bool
     */
    public function createUser (Request $request) {
        $fields = $request->get('formFields');
        $classifys = $request->get('classifys');

        try {
            DB::beginTransaction();
            $tv = User::create([
                'username' => trim($fields['username']),
                'tv_alias_name' => trim($fields['tv_alias_name']),
                'tv_brief' => trim($fields['tv_brief']),
                'tv_description' => trim($fields['tv_description']),
                'register_type' => intval($fields['register_type']),
                'tv_cover' => trim($fields['tv_cover']),
                'tv_show_date' => date('Y-m-d', strtotime($fields['tv_show_date'])),
                'tv_show_year' => date('Y', strtotime($fields['tv_show_year'])),
                'tv_lang' => intval($fields['tv_lang']),
                'tv_area' => intval($fields['tv_area']),
                'tv_actors' => Json::encode($fields['tv_actors'], 1),
                'tv_director' => trim($fields['tv_director']),
                'tv_minute' => intval($fields['tv_minute']),
                'tv_baidu_url' => trim($fields['tv_baidu_url']),
                'tv_baidu_pwd' => trim($fields['tv_baidu_pwd'])
            ]);

            $many = [];
            foreach ($classifys as $item) {
                $itemArr = explode('-', $item);
                $many[] = new TvClassify([
                    'classify_key' => $itemArr[0],
                    'classify_name' => $itemArr[1]
                ]);
            }
            $tv->classifys()->saveMany($many);

            DB::commit();
            return true;
        } catch(\Exception $e){
            DB::rollBack();
            return false;
        }
    }


    /**
     * 修改影视
     *
     * @param Request $request
     * @return bool
     */
    public function updateUser (Request $request) {
        $fields = $request->get('formFields');

        try {
            $model = User::findOrFail($fields['tv_id']);

            $model->username = trim($fields['username']);
            $model->tv_alias_name = trim($fields['tv_alias_name']);
            $model->tv_brief = trim($fields['tv_brief']);
            $model->tv_description = trim($fields['tv_description']);
            $model->register_type = intval($fields['register_type']);
            $model->tv_cover = trim($fields['tv_cover']);
            $model->tv_show_date = date('Y-m-d', strtotime($fields['tv_show_date']));
            $model->tv_show_year = date('Y', strtotime($fields['tv_show_year']));
            $model->tv_lang = intval($fields['tv_lang']);
            $model->tv_area = intval($fields['tv_area']);
            $model->tv_actors = Json::encode($fields['tv_actors'], 1);
            $model->tv_director = trim($fields['tv_director']);
            $model->tv_minute = intval($fields['tv_minute']);
            $model->tv_baidu_url = trim($fields['tv_baidu_url']);
            $model->tv_baidu_pwd = trim($fields['tv_baidu_pwd']);
            return $model->save();
        } catch(\Exception $e){
            return false;
        }
    }


    /**
     * 将影视放入回收站
     *
     * @param $id
     * @return int
     */
    public function destoryUser ($id) {
        return User::destroy($id);
    }


    /**
     * 将影视永久删除
     *
     * @param $id
     * @return int
     */
    public function deleteUser ($id) {
        // $tvModel = User::find($id);
        // return User::forceDelete($id);
    }
}