@extends('layouts.app')

@section('content')
    <ul class="m-auto d-flex flex-column w-50">
        <h1 class="mb-5">Your Task</h1>
        <div class="list-group m-auto mb-4 border-0">
            <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary">Create your own To-Do list!</a>
        </div>
        @foreach ($tasks as $task)
            <div class="d-flex form-check mb-3">
                    <a href="{{ route('tasks.show', $task->id) }}" class="list-group-item list-group-item-action list-group-item-dark border p-2 rounded-start">{{ $task->title }}</a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="list-group-item list-group-item-action list-group-item-dark border p-2 rounded-end mr-4">{{ $task->description }}</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-secondary">Delete</button>
                    </form>
            </div>
        @endforeach
        <div>
            {{ $tasks->links() }}
        </div>
    </ul>
@endsection
