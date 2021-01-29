<?php


namespace App\Unit\Core\Http\Middleware;

use Closure;

class AlwaysExpectsJson
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->segment(1) == 'api') {
            $request->headers->add(['Accept' => 'application/json']);
        }

        return $next($request);
    }
}
