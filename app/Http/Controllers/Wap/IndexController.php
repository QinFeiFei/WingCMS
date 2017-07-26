<?php
namespace App\Http\Controllers\Wap;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index () {
        return view('wap.index');
    }

}