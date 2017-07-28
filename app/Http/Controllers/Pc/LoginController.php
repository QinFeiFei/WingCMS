<?php
namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function tv_list () {
        return view('pc.tv.tv_list');
    }

    public function tv_info($tv_id) {
        return view('pc.tv.tv_info');
    }

}