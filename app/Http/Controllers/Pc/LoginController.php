<?php
namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function register () {
        return view('pc.tv.tv_list');
    }

    public function login() {
        return view('pc.tv.tv_info');
    }

    public function findPassword() {
        return view('pc.tv.tv_info');
    }
}