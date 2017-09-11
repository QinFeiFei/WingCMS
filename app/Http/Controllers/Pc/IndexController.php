<?php
namespace App\Http\Controllers\Pc;

use App\Banner;
use App\Tv;
use Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class IndexController extends PcController
{
    private $indexCacheTime = 60 * 24;     // 1天

    public function index () {
        $banner = Banner::orderBy('banner_sort')->get();
        $movie = $this->movie();
        $teleplay = $this->teleplay();
        $cartoon = $this->cartoon();
        $variety = $this->variety();
        $mv = $this->mv();
        $other = $this->other();

        return view('pc.index')->with([
            'banner' => $banner,
            'movie' => $movie,
            'teleplay' => $teleplay,
            'cartoon' => $cartoon,
            'variety' => $variety,
            'mv' => $mv,
            'other' => $other
        ]);
    }

    private function movie (){
        $data = [];
        $data['puts'] = $this->loadCache('index_movie_puts',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_MOVIE'))->where('is_push', '1')->orderBy('tv_sort')->take(10)->get();
        });

        $data['news'] = $this->loadCache('index_movie_news',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_MOVIE'))->orderBy('created_at','desc')->take(17)->get();
        });

        return $data;
    }

    private function teleplay (){
        $data = [];
        $data['puts'] = $this->loadCache('index_teleplay_puts',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_TELEPLAY'))->where('is_push', '1')->orderBy('tv_sort')->take(10)->get();
        });

        $data['news'] = $this->loadCache('index_teleplay_news',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_TELEPLAY'))->orderBy('created_at','desc')->take(17)->get();
        });

        return $data;
    }

    private function cartoon (){
        $data = [];
        $data['puts'] = $this->loadCache('index_cartoon_puts',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_CARTOON'))->where('is_push', '1')->orderBy('tv_sort')->take(10)->get();
        });

        $data['news'] = $this->loadCache('index_cartoon_news',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_CARTOON'))->orderBy('created_at','desc')->take(17)->get();
        });

        return $data;
    }

    private function variety (){
        $data = [];
        $data['puts'] = $this->loadCache('index_variety_puts',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_VARIETY'))->where('is_push', '1')->orderBy('tv_sort')->take(10)->get();
        });

        $data['news'] = $this->loadCache('index_variety_news',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_VARIETY'))->orderBy('created_at','desc')->take(17)->get();
        });

        return $data;
    }

    private function mv () {
        $data = [];
        $data['puts'] = $this->loadCache('index__puts',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_MV'))->where('is_push', '1')->orderBy('tv_sort')->take(10)->get();
        });

        $data['news'] = $this->loadCache('index__news',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_MV'))->orderBy('created_at','desc')->take(17)->get();
        });

        return $data;
    }

    private function other () {
        $data = [];
        $data['puts'] = $this->loadCache('index_other_puts',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_OTHER'))->where('is_push', '1')->orderBy('tv_sort')->take(10)->get();
        });

        $data['news'] = $this->loadCache('index_other_news',function() {
            return Tv::with('classifys')->where('tv_type', config('tv.TV_OTHER'))->orderBy('created_at','desc')->take(17)->get();
        });

        return $data;
    }

    protected function loadCache($key, $callback)
    {
        if(config('app.debug')){
            return call_user_func($callback);
        }

        return Cache::remember($key, $this->indexCacheTime, $callback);
    }

    public function error404 () {
        return abort(404);
    }
}