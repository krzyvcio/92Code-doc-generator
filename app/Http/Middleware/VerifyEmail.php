<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyEmail
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $next($request);
        } else {
            throw new \Exception("User don't have verified email");
        }
    }
}