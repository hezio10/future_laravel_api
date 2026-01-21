<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException) {
            return response([
                'status' => 'Error',
                'message' => 'token expired'
            ], 401);
        } catch (TokenInvalidException) {
            return response([
                'status' => 'error',
                'message' => 'token invalid'
            ], 401);
        } catch (JWTException) {
            return response([
                'status' => 'error',
                'message' => 'generic'
            ], 401);
        }

        return $next($request);
        
    }
}
