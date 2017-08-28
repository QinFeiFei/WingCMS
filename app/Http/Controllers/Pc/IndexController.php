<?php
namespace App\Http\Controllers\Pc;

use App\Tv;
use Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class IndexController extends PcController
{
    private $indexCacheTime = 60 * 24;     // 1天

    public function index () {
        $movie = $this->movie();
        $teleplay = $this->teleplay();
        $cartoon = $this->cartoon();
        $variety = $this->variety();

        return view('pc.index')->with([
            'movie' => $movie,
            'teleplay' => $teleplay,
            'cartoon' => $cartoon,
            'variety' => $variety,
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