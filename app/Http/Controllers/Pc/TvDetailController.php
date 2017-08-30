<?php
namespace App\Http\Controllers\Pc;


use App\Events\WatchTvEvent;
use App\Services\TvService;
use App\UserCollect;
use Illuminate\Http\Request;

class TvDetailController extends TvController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }


    public function index ($type, $tv_id, TvService $tvService, Request $request){
        $this->checkTvType($type);

        // 获取影视详情
        $info = $tvService->findTv($tv_id, true);
        view()->share('info', $info);

        // 获取相关影视
        $relates = $tvService->relatesTv($request, $info->tv_type, $info->tv_id);
        view()->share('relates', $relates);

        // 获取本类推荐
        $pushs = $tvService->getPushs($request, $info->tv_id);
        view()->share('pushs', $pushs);

        // 是否收藏
        if($this->getUser()){
            $isCollect = UserCollect::where('user_id', $this->getUser()->user_id)->where('tv_id', idDecode($tv_id))->first();
            view()->share('isCollect', $isCollect);
        }

        switch ($type) {
            case 'movie':
                return $this->movieDetail($tv_id, $tvService, $request);
                break;
            case 'teleplay':
                return $this->teleplayDetail($tv_id, $tvService, $request);
                break;
            case 'cartoon':
                return $this->cartoonDetail($tv_id, $tvService, $request);
                break;
            case 'variety':
                return $this->varietyDetail($tv_id, $tvService, $request);
                break;
            case 'mv':
                return $this->mvDetail($tv_id, $tvService, $request);
                break;
            case 'openclass':
                return $this->openclassDetail($tv_id, $tvService, $request);
                break;
            case 'other':
                return $this->otherDetail($tv_id, $tvService, $request);
                break;
        }
    }

    protected function movieDetail ($tv_id, TvService $tvService, Request $request) {
        return view('pc.tv.movieDetail');
    }

    protected function teleplayDetail ($tv_id, TvService $tvService, Request $request) {
        return view('pc.tv.teleplayDetail');
    }

    protected function cartoonDetail ($tv_id, TvService $tvService, Request $request) {
        return view('pc.tv.cartoonDetail');
    }

    protected function varietyDetail ($tv_id, TvService $tvService, Request $request) {
        return view('pc.tv.varietyDetail');
    }

    protected function mvDetail ($tv_id, TvService $tvService, Request $request) {
        return view('pc.tv.mvDetail');
    }

    protected function openclassDetail ($tv_id, TvService $tvService, Request $request) {
        return view('pc.tv.openclassDetail');
    }

    protected function otherDetail ($tv_id, TvService $tvService, Request $request) {
        return view('pc.tv.otherDetail');
    }
}