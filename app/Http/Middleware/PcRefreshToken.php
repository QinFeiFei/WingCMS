<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class PcRefreshToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 手动刷新Token
        try {
            $old_token = JWTAuth::getToken();
            $token = JWTAuth::refresh($old_token);
            setcookie('userToken', 'Bearer '.$token, time()+3600*24*14, '/');

            JWTAuth::invalidate($old_token);
        } catch (JWTException $e) {
        }

        return $next($request);
    }
}
