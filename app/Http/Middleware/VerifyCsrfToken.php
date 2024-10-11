<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/*', // Exclude all API routes from CSRF verification
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Skip CSRF verification for the routes in the $except array
        if ($this->inExceptArray($request)) {
            return $next($request);
        }

        // Perform CSRF verification for non-excluded routes
        if ($request->isMethod('POST') || $request->isMethod('PUT') || $request->isMethod('DELETE')) {
            // Check CSRF token manually if needed
            if (!$this->isCsrfTokenValid($request)) {
                abort(419, 'CSRF token mismatch.');
            }
        }

        return $next($request);
    }

    /**
     * Determine if the request is sending to a route that is in the except array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function inExceptArray(Request $request)
    {
        foreach ($this->except as $except) {
            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Validate the CSRF token.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function isCsrfTokenValid(Request $request)
    {
        // Get the CSRF token from the request
        $token = $request->input('_token');

        // Validate the CSRF token
        return $token && $token === session()->token();
    }
}
