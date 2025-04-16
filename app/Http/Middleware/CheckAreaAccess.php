<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\App\AppArea;


class CheckAreaAccess
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
                $areas = $person->areas()->where('app_area_code', $areaCode)->wherePivot('app_area_person_active', true)->get();

                if ($areas->isNotEmpty()) {
                    $hasAccess = true;
                    break;
                }
            }

            if ($hasAccess) {
                return $next($request);
            }
        }
        $app_area = AppArea::where('app_area_code',$areaCode)
            ->first();
        if ($app_area) {
            return redirect('/users/'. $user->id)
                ->with('error', 'Nimate dostopa do '. $app_area->app_area_name); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike
        } else {
            return redirect('/users/'. $user->id)
            ->with('error', 'Področje ne obstaja.'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike
        }
            return redirect('/home')->with('error', 'Nimate dostopa');
        
        $user = Auth::user();

        if ($user && $user->person) {
            $person = $user->person;
            $areas = $person->areas()->where('app_area_code', $areaCode)->wherePivot('app_area_person_active', true)->get();

            if ($areas->isNotEmpty()) {
                return $next($request);
            }
        }
        return redirect('/users/'. $user->id)
            ->with('error', 'Nimate dostopa'); // Ali katerakoli stran, kamor želiš preusmeriti nepooblaščene uporabnike
    }
}
