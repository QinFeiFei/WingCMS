<?php
namespace App\Http\Controllers\Pc;


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
        dd($tv_id);
    }
}