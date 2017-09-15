<?php
namespace App\Http\Controllers\Pc;

use App\Services\UserWatchService;
use App\TvClass;
use App\TvFeedback;
use App\TvSeek;
use Illuminate\Http\Request;

class TvController extends PcController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }


    /**
     * 检测路由中的Type是否为支持的影视类型
     *
     * @param $type
     * @return mixed
     */
    protected function checkTvType ($type){
        if(! in_array($type, config('tv.tv_Types'))){
            abort(404);
            exit;
        }
        return true;
    }

    public function addWatch ($tv_id){
        $user_id = $this->getUser() ? $this->getUser()->user_id : 0;
        $userWatchService = new UserWatchService();
        $userWatchService->addViewedGoods($tv_id, $user_id);
    }

    public function getClass ($tv_type) {
        return TvClass::where('tv_type', $tv_type)->get();
    }

    public function feed (){
        $isexists = TvFeedback::where('tv_id', idDecode(request('tv_id')))->where('type', request('type', '-1'))->where('is_handle', '0')->first();
        if($isexists){
            return output_success('反馈成功');
        }

        $model = new TvFeedback();
        $model->tv_id = idDecode(request('tv_id'));
        $model->tv_name = request('tv_name');
        $model->type = request('type');
        $user = $this->getUser();
        if($user){
            $model->user_id = $user->user_id;
            $model->username = $user->username;
        }
        $model->save();
        return output_success('反馈成功');
    }

    public function seek (){
        $user = $this->getUser();
        if(!$user){ return output_error('请先登陆'); }
        if(empty($user->email)){ return output_error('请先绑定邮箱'); }

        $isexists = TvSeek::where('tv_name', request('tv_name'))->first();
        if($isexists){
            return output_success('提交成功');
        }

        $model = new TvSeek();
        $model->tv_name = request('tv_name');
        $model->user_id = $user->user_id;
        $model->username = $user->username;
        $model->save();
        return output_success('提交成功');

    }
}