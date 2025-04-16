<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\App\AppArea;

class CheckUserArea
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $areaCode)
    {
        $user = Auth::user();

        if ($user) {
            $hasAccess = false;

            foreach ($user->people as $person) {
                $areas = $person->positions()
                    ->whereHas('areas', function ($query) use ($areaCode) {
                        $query->where('app_area_code', $areaCode)
                            ->whereNull('app_area_parent_id');
                    })
                    ->get();

                if ($areas->isNotEmpty()) {
                    $hasAccess = true;
                    break;
                }
            }

            if ($hasAccess) {
                return $next($request);
            }
        }

        $app_area = AppArea::where('app_area_code', $areaCode)->first();
        if ($app_area) {
            return redirect('/users/' . $user->id)
                ->with('error', 'Nimate dostopa do ' . $app_area->app_area_name);
        } else {
            return redirect('/users/' . $user->id)
                ->with('error', 'Področje ne obstaja.');
        }
    }
}
