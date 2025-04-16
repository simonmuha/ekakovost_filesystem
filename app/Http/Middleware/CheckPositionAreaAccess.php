<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPositionAreaAccess
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
        $user = Auth::user();

        if ($user) {
            foreach ($user->people as $person) {
                // Poišči vsa delovna mesta, ki jih ima oseba
                $positions = $person->positions;

                foreach ($positions as $position) {
                    // Preveri, če katero od delovnih mest pripada določenemu področju
                    $areas = $position->areas()->where('app_area_code', $areaCode)->get();

                    if ($areas->isNotEmpty()) {
                        return $next($request);
                    }
                }
            }
        }

        return redirect('/home')->with('error', 'Nimate dostopa');
    }
}
