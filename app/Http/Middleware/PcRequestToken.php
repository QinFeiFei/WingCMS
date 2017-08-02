<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class PcRequestToken
{
    public function __construct()
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = isset($_COOKIE['userToken']) ? $_COOKIE['userToken'] : '' ;
        // 将旧token填充至请求的Request Header头中
        $request->headers->set('Authorization', $token);

        // 获取用户
        view()->share('user', auth('api')->user());

        return $next($request);
    }
}
