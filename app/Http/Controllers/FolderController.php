<?php

namespace App\Http\Controllers;

use App\Http\Requests\FolderRequest;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Auth::user()->folders()->paginate(10);

        return view('folders.index', compact('folders'));
    }

    public function create()
    {
        return view('folders.create');
    }

    public function store(FolderRequest $request, Folder $folder)
    {
        Auth::user()->folders()->create($request->validated());

        return redirect()->route('folders.index', $folder);
    }

    public function show($id)
    {
        $folder = Folder::findOrFail($id);
        $tasks = $folder->tasks;

        return view('folders.show', compact('folder', 'tasks'));
    }

    public function edit(Folder $folder)
    {
        return view('folders.edit', compact('folder'));
    }

    public function update(FolderRequest $request, Folder $folder)
    {
        $folder->update($request->validated());

        return redirect()->route('folders.index');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();

        return redirect()->route('folders.index');
    }
}
