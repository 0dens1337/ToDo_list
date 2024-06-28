@extends('layouts.app')
@section('content')
    <div class="card w-50 p-4 m-auto" >
        <div class="card-header">
            <h2>{{ $task->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong>{{ $task->id }}</p>
            <p><strong>Description:</strong>{{ $task->description }}</p>
            <p><strong>Folder: {{ $task->folder ? $task->folder->name : 'None' }}</strong></p>
        </div>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning m-auto">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
            <button type="submit" class="btn btn-danger w-10 m-auto">Delete</button>
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
