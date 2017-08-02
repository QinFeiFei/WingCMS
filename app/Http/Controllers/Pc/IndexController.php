<?php
namespace App\Http\Controllers\Pc;

class IndexController extends PcController
{
    public function index () {
        return view('pc.index');
    }
}