<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Storage\Entity;
use Illuminate\Support\Facades\Auth;



class EntityController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $entities = $user->entities()->with('files')->get();

        return view('users.files.index', compact('entities'));
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Entity::create($request->only('name'));
        return redirect()->route('storage.admin_dashboard')->with('success', 'Entiteta dodana.');
    }
}
