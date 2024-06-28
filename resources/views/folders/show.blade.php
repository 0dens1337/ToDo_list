@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>{{ $folder->name }} - Task</h2>

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
            @endforeach
                    <a href="{{ route('tasks.create') }}" class="btn btn-outline-info text-center">Create Tasks in Folder: {{ $folder->name }}</a>
                </div>
            </div>

    </div>
@endsection
