<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if ($request->user() && $request->user()->role === 'admin') {
    //         return $next($request);
    //     }

    //     abort(403, 'Unauthorized action.');
    // }
  

    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admins')->check()) {
            return redirect()->route('admin.AdminLogin')->with('message', 'Please login first.');
        }
        return $next($request);
    }
}
