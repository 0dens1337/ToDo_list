@extends('layouts.app')
@section('content')
    <h1>Edit Folder</h1>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4">
                <div class="card">
                    <form action="{{ route('folders.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Folder Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
