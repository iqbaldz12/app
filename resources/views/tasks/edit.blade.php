@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Task</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tasks_name">Task Name</label>
            <input type="text" class="form-control" id="tasks_name" name="tasks_name" value="{{ old('tasks_name', $task->tasks_name) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="attachment">Attachment</label>
            @if($task->file)
                <a href="{{ asset('files/tasks/'.$task->file) }}" target="_blank">Current File</a>
            @endif
            <input type="file" class="form-control" id="attachment" name="file">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
