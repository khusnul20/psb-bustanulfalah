<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventBackHistory
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
        // return $next($request);
        $response = $next($request);
        return $response->header('Cache-Control', 'noncache, no-store, max-age=0;must-revalidate')
            ->header('Pragma', 'no-cahche')
            ->header('Expires', 'Sun, 02 Jan 1999 00:00:00 GMT');
    }
}
