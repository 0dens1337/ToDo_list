@extends('layouts.app')
@section('content')
    <h1 class="mb-5 text-center">Your Tasks</h1>
    <div class="list-group m-auto mb-4 border-0">
        <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary">Create your own To-Do list!</a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped-columns table-sm table-active">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
