<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureLibrarian
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'librarian') {
            return $next($request);
        }

        return redirect()->route('unauthorized'); // Redirect or abort if not authorized
    }
}
