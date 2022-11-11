<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class inCouncil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->isInCouncil()) echo "Jest";
        else echo "nie jest";
        return $next($request);
    }
}
