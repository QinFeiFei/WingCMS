<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Json;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserService $service)
    {
        $list = $service->pageList($request);
        return $list;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserService $service)
    {
        $validBack = $this->valid($request);
        if(! $validBack['state']){ return output_error($validBack['error']); }

        if( $service->createUser($request, 'admin') )
            return output_success("添加成功");
        else
            return output_error("添加失败");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, UserService $service)
    {
        return $service->findUser($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserService $service, $id)
    {
        $validBack = $this->valid($request);
        if(! $validBack['state']){ return output_error($validBack['error']); }

        if( $service->updateUser($request) )
            return output_success("修改成功");
        else
            return output_error("修改失败");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, UserService $UserService)
    {
        if($UserService->destoryUser($id)) {
            return output_success('删除成功');
        }else{
            return output_error('服务器处理失败.');
        }
    }

    public function delete(UserService $UserService){
        // 暂时不做强制删除接口

    }

    /**
     * 插入或更新数据时，验证字段
     *
     * @param Request $request
     * @return array
     */
    private function valid(Request $request) {
        $validArr = [ 'state' => true, 'error' => '' ];
        $validator = Validator::make($request->get('formFields'), [
            'username' => 'required',
            'password' => 'between:6,20',
            'email' => 'email',
            'phone' => "mobile"
        ], [
            'username.required' => '用户名必填!',
            'password.between' => '密码长度必须为6-30位!',
            'email.email' => '邮箱格式错误!',
            'phone.mobile' => '手机格式错误!'
        ]);

        if ($validator->fails()) {
            $validArr['state'] = false;
            $validArr['error'] = $validator->errors()->first();
        }
        return $validArr;
    }

    /**
     * 设置某个字段的值
     *
     * @return Json
     */
    public function setField(Request $request, UserService $service){
        $validator = Validator::make($request->all(), [
            'tv_id' => 'required|exists:tv,tv_id',
            'field' => 'required',
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return output_error("数据不完整.");
        }

        if($service->setField($request) === true){
            return output_success("更新成功.");
        } else {
            return output_error("更新失败");
        }
    }

    /**
     * 上传用户头像图片
     *
     * @param Request $request
     * @return String
     */
    public function uploadAvatar (Request $request) {
        $file = $request->file('avatar');
        $hashname = $file->hashName();

        Storage::putFileAs('public/user', $file, $hashname);

        return output_data('user/'. $hashname);
    }
}
