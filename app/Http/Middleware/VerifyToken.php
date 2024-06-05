<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class VerifyToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = PersonalAccessToken::findToken($request->header('Authorization'));

        if (!$token || !$token->tokenable->hasVerifiedEmail()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}