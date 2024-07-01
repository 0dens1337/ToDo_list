@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="text-center">{{ $folder->name }} - Tasks</h2>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach($tasks as $task)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <p class="card-text">{{ $task->description }}</p>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-outline-secondary">View Task</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if($tasks->isEmpty())
                <div class="col-12 text-center">
                    <p>No tasks available in this folder.</p>
                </div>
            @endif
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('tasks.create', ['folder_id' => '$folder->id']) }}" class="btn btn-outline-info">Create Tasks in Folder: {{ $folder->name }}</a>
        </div>
        <div class="text-center mt-4">
            <form action="{{ route('folders.destroy', $folder->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">Delete folder: {{ $folder->name }}</button>
            </form>
        </div>
    </div>
@endsection
