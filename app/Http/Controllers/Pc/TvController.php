<?php
namespace App\Http\Controllers\Pc;

use App\Services\UserWatchService;
use App\TvClass;
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
}