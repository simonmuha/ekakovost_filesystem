<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use \App\Models\Storage\Tag;
use \App\Models\Storage\Entity;
use \App\Models\Storage\File;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Storage;


class FileController extends Controller
{

public function index(Request $request)
{
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
    if ($request->filled('tag_id')) {
        $query->whereHas('tags', fn($q) => $q->where('tags.id', $request->tag_id));
    }

    // 3. Filter po entiteti
    if ($request->filled('entity_id')) {
        $query->whereHas('entities', fn($q) => $q->where('entities.id', $request->entity_id));
    }

    $files = $query->with(['tags', 'entities'])->latest()->get();

    return view('storage.index', [
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
        'file' => 'required|file|max:10240',
        'comments' => 'nullable|string',
        'tags' => 'array',
        'entities' => 'array',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after_or_equal:valid_from',
    ]);

    $uploaded = $request->file('file');
    $path = $uploaded->store('documents', 'public');

    $file = File::create([
        'user_id' => auth()->id(),
        'name' => $uploaded->getClientOriginalName(),
        'path' => $path,
        'mime_type' => $uploaded->getMimeType(),
        'size' => $uploaded->getSize(),
        'filetype' => $uploaded->getClientOriginalExtension(), // tip datoteke
        'access' => $request->input('access'),
        'comments' => $request->input('comments'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
    ]);

    $file->tags()->sync($request->input('tags', []));
    $file->entities()->sync($request->input('entities', []));

    return redirect()->route('storage.create')->with('success', 'Datoteka uspešno dodana.');
}

public function download(File $file)
{
    // autorizacija lahko dodaš tu
    return Storage::disk('public')->download($file->path, $file->name);
}


}
