<?php

namespace App\Http\Controllers;

use App\Http\Requests\FolderRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->with('folder')->paginate(10);
        $folders = Folder::all();

        return view('tasks.index', compact('tasks', 'folders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $folders = Folder::pluck('name', 'id');

        return view('tasks.create', compact('folders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request, Folder $folder)
    {
        Auth::user()->tasks()->create($request->validated());

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $folders = Folder::pluck('name', 'id');

        return view('tasks.edit', compact('task', 'folders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task)
    {

        $task->update($request->validated());

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
