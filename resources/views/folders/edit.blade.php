@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Folder</h1>
        <form action="{{ route('folders.update', $folder) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Folder Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $folder->name) }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
