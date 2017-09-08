<?php
namespace App\Http\Controllers\Pc;

use App\Services\TvService;
use App\Tv;
use App\TvClass;
use DB;
use Illuminate\Http\Request;

class TvListController extends TvController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index ($type, Request $request, TvService $tvService){
        $this->checkTvType($type);
        $areas = config('tv.tv_areas');
        $years = config('tv.tv_years');
        $classifys = TvClass::where('tv_type', replaceTvTypeText($type))->get();

        view()->share('areas', $areas);
        view()->share('classifys', $classifys);
        view()->share('years', $years);

        switch ($type) {
            case 'movie':
                return $this->movieList($request, $tvService);
                break;
            case 'teleplay':
                return $this->teleplayList($request, $tvService);
                break;
            case 'cartoon':
                return $this->cartoonList($request, $tvService);
                break;
            case 'variety':
                return $this->varietyList($request, $tvService);
                break;
            case 'mv':
                return $this->mvList($request, $tvService);
                break;
            case 'openclass':
                return $this->openclassList($request, $tvService);
                break;
            case 'other':
                return $this->otherList($request, $tvService);
                break;
        }
    }

    protected function movieList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_MOVIE'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.movieList')->with(['list'=>$list]);
    }

    protected function teleplayList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_TELEPLAY'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.teleplayList')->with(['list'=>$list]);
    }

    protected function cartoonList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_CARTOON'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.cartoonList')->with(['list'=>$list]);
    }

    protected function varietyList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_VARIETY'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.varietyList')->with(['list'=>$list]);
    }

    protected function mvList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_MV'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.mvList')->with(['list'=>$list]);
    }

    protected function openclassList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_OPENCLASS'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.openclassList')->with(['list'=>$list]);
    }

    protected function otherList (Request $request, TvService $tvService) {
        request()->offsetSet('tv_type', config('tv.TV_OTHER'));
        $list = $tvService->pageList($request, 10);

        return view('pc.tv.otherList')->with(['list'=>$list]);
    }
}