<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Storage\Entity;


class EntityController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Entity::create($request->only('name'));
        return redirect()->route('storage.admin_dashboard')->with('success', 'Entiteta dodana.');
    }
}
