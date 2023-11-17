<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckChefProjet
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
        // Check if the user has the role "chefProjet"
        if ($request->user() && $request->user()->role == "chefProjet") {
            return $next($request);
        }

        // If the user doesn't have the role, you can customize the response or redirect them
        abort(403, 'Unauthorized action.');
    }
}
