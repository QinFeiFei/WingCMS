<?php
namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index () {
        return view('pc.index');
    }
}