<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeamsPermissionMiddleware
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

        if (!empty(auth()->user())) {
            // Nastavitev vrednosti seje ob prijavi
            setPermissionsTeamId(session('team_id'));
        }

        // Dodatni načini pridobivanja team_id
        /*
        if (!empty(auth('api')->user())) {
            // Primer prilagojenega načina za pridobivanje team_id
            setPermissionsTeamId(auth('api')->user()->getTeamIdFromToken());
        }
        */
        return $next($request);
    }
}
