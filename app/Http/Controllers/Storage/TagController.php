<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Storage\Tag;


class TagController extends Controller
{
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);
        Tag::create($request->only('name', 'description'));
        return redirect()->route('storage.admin_dashboard')->with('success', 'Oznaka/kategorija dodana.');
    }
}
