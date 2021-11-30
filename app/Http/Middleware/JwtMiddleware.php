<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;


class JwtMiddleware
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
        try {
            $user =  JWTAuth::parseToken()->authenticate();
        }catch (\Exception $exception){
            if($exception instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(["message"=>"Token ko hợp lệ"]);
            }
            if($exception instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(["message"=>"Token hết hạn"]);
            }
            return response()->json(["message"=>"Token ko được tìm thấy"]);
        }
        return $next($request);
    }
}
