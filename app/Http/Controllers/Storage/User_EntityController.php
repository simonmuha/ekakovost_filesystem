<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Storage\User_Entity;


class User_EntityController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'entity_id' => 'required|exists:entities,id',
        ]);

        User_Entity::updateOrInsert([
            'user_id' => $request->user_id,
            'entity_id' => $request->entity_id,
        ]);

        return redirect()->route('storage.admin_dashboard')->with('success', 'Uporabnik povezan z entiteto.');
    }
}
