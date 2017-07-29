<?php
namespace App\Http\Controllers\Pc;


use App\Services\TvService;

class TvDetailController extends TvController
{
    public function movieDetail ($tv_id, TvService $tvService) {
        $info = $tvService->findTv($tv_id, true);
        return view('pc.tv.movieDetail')->with(['info'=>$info]);
    }

    public function teleplayDetail ($tv_id, TvService $tvService) {
        $info = $tvService->findTv($tv_id, true);
        return view('pc.tv.teleplayDetail')->with(['info'=>$info]);
    }

    public function cartoonDetail ($tv_id, TvService $tvService) {
        $info = $tvService->findTv($tv_id, true);
        return view('pc.tv.cartoonDetail')->with(['info'=>$info]);
    }

    public function varietyDetail ($tv_id, TvService $tvService) {
        $info = $tvService->findTv($tv_id, true);
        return view('pc.tv.varietyDetail')->with(['info'=>$info]);
    }

    public function mvDetail ($tv_id, TvService $tvService) {
        $info = $tvService->findTv($tv_id, true);
        return view('pc.tv.mvDetail')->with(['info'=>$info]);
    }

    public function openclassDetail ($tv_id, TvService $tvService) {
        $info = $tvService->findTv($tv_id, true);
        return view('pc.tv.openclassDetail')->with(['info'=>$info]);
    }

    public function otherDetail ($tv_id, TvService $tvService) {
        $info = $tvService->findTv($tv_id, true);
        return view('pc.tv.otherDetail')->with(['info'=>$info]);
    }
}