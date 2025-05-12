<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Storage\SchoolYear;


class SchoolYearController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after:start'
        ]);
        SchoolYear::create($request->only('name', 'start', 'end'));
        return redirect()->route('storage.admin_dashboard')->with('success', 'Šolsko leto dodano.');
    }
}
