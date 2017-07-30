<?php
namespace App\Http\Controllers\Pc;


use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function error404 () {
        return view('errors.404');
    }

    public function error500 () {
        return view('errors.500');
    }
}