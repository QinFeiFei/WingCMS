<?php
namespace App\Http\Controllers\Pc;

use App\Services\TvService;
use Illuminate\Http\Request;

class TvListController extends TvController
{
    public function movieList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_MOVIE'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.movieList')->with(['list'=>$list]);
    }

    public function teleplayList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_TELEPLAY'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.teleplayList')->with(['list'=>$list]);
    }

    public function cartoonList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_CARTOON'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.cartoonList')->with(['list'=>$list]);
    }

    public function varietyList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_VARIETY'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.varietyList')->with(['list'=>$list]);
    }

    public function mvList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_MV'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.mvList')->with(['list'=>$list]);
    }

    public function openclassList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_OPENCLASS'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.openclassList')->with(['list'=>$list]);
    }

    public function otherList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_OTHER'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.otherList')->with(['list'=>$list]);
    }
}