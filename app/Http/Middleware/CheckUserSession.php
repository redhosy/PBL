<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $timeout = config('session.lifetime') * 60; // Timeout in seconds

        $lastActivity = Session::get('last_activity_time', time());

        if ((time() - $lastActivity) > $timeout) {
            Auth::logout();
            Session::flush();
            return redirect()->route('login')->with('error', 'Session expired, please login again.');
        }

        Session::put('last_activity_time', time());

        return $next($request);
    }
}
