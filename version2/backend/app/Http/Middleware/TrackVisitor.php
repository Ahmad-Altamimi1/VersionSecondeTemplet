<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Get the visitor's IP address
        $ipAddress = $request->ip();

        // Check if the visitor is already recorded (you can use a cookie for this)
        if (!$request->cookie('visitor_recorded')) {
            // Record the visitor's information in the database
            DB::table('visitors')->insert(['ip_address' => $ipAddress]);

            // visitor::create(['ip_address' => $ipAddress]);
            // dd($ipAddress);
            // Set a cookie to prevent duplicate recording
            return $next($request)->cookie('visitor_recorded', true, 60 * 24 * 365); // 1 year
        }

        return $next($request);
    }
}
