@extends('layouts.app')
@section('content')
    <h1 class="mb-5 text-center">Your Tasks</h1>
    <h3 class="text-center">Folders
            <a class="btn btn-outline-secondary" href="{{ route('folders.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"></path>
                </svg>
                <span class="visually-hidden">Button</span>
            </a>
    </h3>
    <div class="d-flex flex-wrap justify-content-center">
        @foreach($folders as $folder)
            <div class="col-md-1.5 mx-2">
                <div class="card container mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $folder->name }}</h5>
                        <a href="{{ route('folders.show', $folder->id) }}" class="btn btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                                <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139q.323-.119.684-.12h5.396z"></path>
                            </svg>
                            View Tasks
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $folders->links() }}
    </div>
    <div class="list-group m-auto mb-4 mt-4 border-0">
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
                        <th>Folders</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ optional($task->folder)->name ?? 'No Folder' }}</td>
                            <td>{{ $task->is_completed ? 'Completed': 'In progress'}}</td>
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
