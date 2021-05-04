<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class Profanity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Str::contains($request->input('content'), ['hate', 'idiot', 'stupid'])) {
            return response()->view('forbidden-comment');
        }

        return $next($request);
    }
}
