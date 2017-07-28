<?php
namespace App\Http\Controllers\Pc;

class TvListController extends TvController
{
    public function movieList () {
        return view('pc.tv.movieList');
    }

    public function teleplayList () {
        return view('pc.tv.teleplayList');
    }

    public function cartoonList () {
        return view('pc.tv.cartoonList');
    }

    public function varietyList () {
        return view('pc.tv.varietyList');
    }

    public function mvList () {
        return view('pc.tv.mvList');
    }

    public function openclassList () {
        return view('pc.tv.openclassList');
    }

    public function otherList () {
        return view('pc.tv.otherList');
    }
}