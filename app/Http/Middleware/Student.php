<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Student
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
        if (!Auth::guest() && isset(Auth::user()->student)) {
            return $next($request);
        } elseif (!Auth::guest() && isset(Auth::user()->parent)) {
            return $next($request);
        }
        return back()->withInput();
    }
}
