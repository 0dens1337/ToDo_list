@section('content')
    @include('includes.error')
    <form action="{{ $action }}" method="POST" class="border w-50 p-4 m-auto">
        @csrf
        @method($method)
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Create task name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                   placeholder="name@example.com" value="{{ isset($task) ? $task->title : null }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                      rows="3">{{ isset($task) ? $task->description : null }}</textarea>
        </div>

        <div class="form-group mb-2">
            <label for="folder_id">Folder (optional)</label>
            <select name="folder_id" class="form-control" id="folder_id">
                <option value="">No Folder</option>
                @foreach($folders as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <a href="{{ route('folders.create') }}" class="btn btn-outline-info">Create Folder</a>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn  btn-outline-primary">Save it!</button>
        </div>

    </form>
@endsection
