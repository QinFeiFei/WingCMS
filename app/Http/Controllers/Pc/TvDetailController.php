<?php
namespace App\Http\Controllers\Pc;


class TvDetailController extends TvController
{
    public function movieDetail () {
        return view('pc.tv.movieDetail');
    }

    public function teleplayDetail () {
        return view('pc.tv.teleplayDetail');
    }

    public function cartoonDetail () {
        return view('pc.tv.cartoonDetail');
    }

    public function varietyDetail () {
        return view('pc.tv.varietyDetail');
    }

    public function mvDetail () {
        return view('pc.tv.mvDetail');
    }

    public function openclassDetail () {
        return view('pc.tv.openclassDetail');
    }

    public function otherDetail () {
        return view('pc.tv.otherDetail');
    }
}