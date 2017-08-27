<?php
namespace App\Http\Controllers\Pc;


use App\Events\WatchTvEvent;
use App\Services\TvService;
use Illuminate\Http\Request;

class TvDetailController extends TvController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }


    public function index ($type, $tv_id, TvService $tvService, Request $request){

    }





    public function movieDetail ($tv_id, TvService $tvService, Request $request) {
        $info = $tvService->findTv($tv_id, true);

        // 获取相关影视
        $relates = $tvService->relatesTv($request, $info->tv_type, $info->tv_id);

        // 获取本类推荐
        $pushs = $tvService->getPushs($request, $info->tv_id);

        return view('pc.tv.movieDetail')->with(['info'=>$info, 'relates'=>$relates, 'pushs'=>$pushs]);
    }

    public function teleplayDetail ($tv_id, TvService $tvService, Request $request) {
        $info = $tvService->findTv($tv_id, true);

        // 获取相关影视
        $relates = $tvService->relatesTv($request, $info->tv_type, $info->tv_id);

        // 获取本类推荐
        $pushs = $tvService->getPushs($request, $info->tv_id);

        return view('pc.tv.teleplayDetail')->with(['info'=>$info, 'relates'=>$relates, 'pushs'=>$pushs]);
    }

    public function cartoonDetail ($tv_id, TvService $tvService, Request $request) {
        $info = $tvService->findTv($tv_id, true);

        // 获取相关影视
        $relates = $tvService->relatesTv($request, $info->tv_type, $info->tv_id);

        // 获取本类推荐
        $pushs = $tvService->getPushs($request, $info->tv_id);

        return view('pc.tv.cartoonDetail')->with(['info'=>$info, 'relates'=>$relates, 'pushs'=>$pushs]);
    }

    public function varietyDetail ($tv_id, TvService $tvService, Request $request) {
        $info = $tvService->findTv($tv_id, true);

        // 获取相关影视
        $relates = $tvService->relatesTv($request, $info->tv_type, $info->tv_id);

        // 获取本类推荐
        $pushs = $tvService->getPushs($request, $info->tv_id);

        return view('pc.tv.varietyDetail')->with(['info'=>$info, 'relates'=>$relates, 'pushs'=>$pushs]);
    }

    public function mvDetail ($tv_id, TvService $tvService, Request $request) {
        $info = $tvService->findTv($tv_id, true);

        // 获取相关影视
        $relates = $tvService->relatesTv($request, $info->tv_type, $info->tv_id);

        // 获取本类推荐
        $pushs = $tvService->getPushs($request, $info->tv_id);

        return view('pc.tv.mvDetail')->with(['info'=>$info, 'relates'=>$relates, 'pushs'=>$pushs]);
    }

    public function openclassDetail ($tv_id, TvService $tvService, Request $request) {
        $info = $tvService->findTv($tv_id, true);

        // 获取相关影视
        $relates = $tvService->relatesTv($request, $info->tv_type, $info->tv_id);

        // 获取本类推荐
        $pushs = $tvService->getPushs($request, $info->tv_id);

        return view('pc.tv.openclassDetail')->with(['info'=>$info, 'relates'=>$relates, 'pushs'=>$pushs]);
    }

    public function otherDetail ($tv_id, TvService $tvService, Request $request) {
        $info = $tvService->findTv($tv_id, true);

        // 获取相关影视
        $relates = $tvService->relatesTv($request, $info->tv_type, $info->tv_id);

        // 获取本类推荐
        $pushs = $tvService->getPushs($request, $info->tv_id);

        return view('pc.tv.otherDetail')->with(['info'=>$info, 'relates'=>$relates, 'pushs'=>$pushs]);
    }
}