<?php

namespace App\Http\Middleware;

use App\Model\User;
use Closure;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTAuth;


class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            try {
                //$user = JWTAuth::toUser($request->input('token'));
                if(User::where('auth_token',$request->input('token'))){
                    return $next($request);
                }else{
                    return response()->json(["message"=>"Tài khoản người dùng ko đứng",400]);
                }
            } catch (\Exception $e) {
                if ($e instanceof TokenInvalidException) {
                    return $next($request);
                    return response()->json(['error' => 'Token is Invalid']);
                } else if ($e instanceof TokenExpiredException) {
                    return $next($request);
                    return response()->json(['error' => 'Token is Expired']);
                } else {
                    return $next($request);
                    return response()->json(['error' => 'Something is wrong']);
                }
            }

            return $next($request);

}
}
