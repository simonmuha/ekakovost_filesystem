<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\App\AppOrganization;

class CheckActiveOrganization
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
        if (!$request->route('app_organization_id')) {
            return $next($request);
        }

        $user = Auth::user(); 

        if ($user) {
            $app_organization_active = $user->active_organization;
            $app_organization_id = $request->route('app_organization_id');
            $app_organization = AppOrganization::find($app_organization_id);

            if ($app_organization_active && $app_organization &&
                ($app_organization_active->id == $app_organization_id ||
                $app_organization_active->id == $app_organization->app_organization_parent_id)) {
                return $next($request);
            }
        }

        return redirect('/home')->with('error', 'Nimate dostopa');
    }
}
