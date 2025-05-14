<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use \App\Models\Storage\Tag;
use \App\Models\Storage\Entity;
use \App\Models\Storage\File;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{

public function index(Request $request)
{
    $user = Auth::user();
    $user = auth()->user();
    $entityIds = $user->entities()->pluck('entities.id');

    $query = File::query();

    // 1. Filter dostopa
    if ($request->access === 'public') {
        $query->where('access', 'public');
    } elseif ($request->access === 'school') {
        $query->where('access', 'school');
    } elseif ($request->access === 'private') {
        $query->where('access', 'private')
              ->whereHas('entities', fn($q) => $q->whereIn('entities.id', $entityIds));
    } else {
        // Prikaži vse, do katerih ima uporabnik dostop
        $query->where(function ($q) use ($entityIds) {
            $q->where('access', 'public')
              ->orWhere('access', 'school')
              ->orWhere(function ($q2) use ($entityIds) {
                  $q2->where('access', 'private')
                     ->whereHas('entities', fn($e) => $e->whereIn('entities.id', $entityIds));
              });
        });
    }

    // 2. Filter po tagu
if ($request->filled('tags')) {
    $query->whereHas('tags', function ($q) use ($request) {
        $q->whereIn('tags.id', $request->input('tags', []));
    });
}

// 3. Filter po entitetah
if ($request->filled('entities')) {
    $query->whereHas('entities', function ($q) use ($request) {
        $q->whereIn('entities.id', $request->input('entities', []));
    });
}

    $files = $query->with(['tags', 'entities'])->latest()->get();

    return view('users.files.index', [
        'accessOptions' => [
            'public' => 'Javna',
            'school' => 'Šola',
            'private' => 'Zasebna'
            ],
        'user' =>$user,
        'files' => $files,
        'tags' => Tag::all(),
        'entities' => Entity::all(),
    ]);
}



public function create()
{
    return view('storage.create', [
        'tags' => Tag::orderBy('name')->get(),
        'entities' => Entity::all(),
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'file_url' => 'required|url',
        'comments' => 'nullable|string',
        'tags' => 'array',
        'entities' => 'array',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'access' => 'required|in:public,school,private',
    ]);

    $file = File::create([
        'user_id' => auth()->id(),
        'name' => basename(parse_url($request->file_url, PHP_URL_PATH)), // iz linka vzame ime
        'url' => $request->file_url, // shranimo samo URL
        'access' => $request->input('access'),
        'comments' => $request->input('comments'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
    ]);

    $file->tags()->sync($request->input('tags', []));
    $file->entities()->sync($request->input('entities', []));

    return redirect()->route('storage.create')->with('success', 'Povezava uspešno shranjena.');
}

public function download(File $file)
{
    $user = auth()->user();

    // Če nima dostopa, zavrni
    if (
        $file->access === 'private' &&
        !$file->entities()->whereIn('entities.id', $user->entities()->pluck('entities.id'))->exists()
    ) {
        abort(403, 'Nimaš dostopa do te datoteke.');
    }

    return Storage::disk('public')->download($file->path, $file->name);
}

}
