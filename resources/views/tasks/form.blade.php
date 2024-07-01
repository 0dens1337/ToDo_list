@section('content')
    @include('includes.error')
    <form action="{{ $action }}" method="POST" class="border w-50 p-4 m-auto">
        @csrf
        @method($method)

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Create task name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                   placeholder="Enter task name" value="{{ isset($task) ? $task->title : old('title') }}">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                      rows="3">{{ isset($task) ? $task->description : old('description') }}</textarea>
        </div>

        <div class="form-group mb-2">
            <label for="folder_id">Folder (optional)</label>
            <select name="folder_id" class="form-control" id="folder_id" {{ request('folder_id') ? 'disabled' : '' }}>
                <option value="">No Folder</option>
                @foreach($folders as $id => $name)
                    <option value="{{ $id }}"
                        {{
                            (isset($task) && $task->folder_id == $id) ||
                            (request('folder_id') == $id) ||
                            (old('folder_id') == $id) ? 'selected' : ''
                        }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
            @if(request('folder_id'))
                <input type="hidden" name="folder_id" value="{{ request('folder_id') }}">
            @endif
        </div>

        @if (isset($task))
            <div class="mb-3">
                <label for="completed">Completed</label>
                <input type="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('folders.create') }}" class="btn btn-outline-info">Create Folder</a>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-outline-primary">Save it!</button>
        </div>
    </form>
@endsection
