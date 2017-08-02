<?php
namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PcController extends Controller
{
    public function __construct(Request $request)
    {
    }


    /**
     * 获取用户
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected function getUser () {
        return auth('api')->user();
    }
}