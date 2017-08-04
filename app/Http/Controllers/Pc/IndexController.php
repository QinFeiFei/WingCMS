<?php
namespace App\Http\Controllers\Pc;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class IndexController extends PcController
{
    public function index () {
        return view('pc.index');
    }
}