<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //xu ly authentication

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role == "11"){
            return $next($request);
        }
        return redirect('/login');
    }
}