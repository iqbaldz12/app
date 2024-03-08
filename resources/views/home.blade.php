<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Task</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styles Removed for Brevity -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Navbar content here -->
    </nav>

    <div class="container">
        <h1 class="my-4 text-center">List Task</h1>
        <div class="text-right">
            <a href="{{ route('tasks.create') }}" class="mb-3 btn btn-success">New Task</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Attachment</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Assume $tasks is passed to the view -->
                @foreach ($tasks as $index => $task)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $task->tasks_name }}</td>
                        <td>{{ $task->description }}</td>
                        <td><a href="{{ Storage::url($task->attachment) }}">File</a></td>
                        <td>
                            <!-- Approvement Button -->
                            <a href="{{ route('approvement', $task->id) }}" class="btn btn-approvement btn-sm">Approvement</a>
                            <!-- Show Button -->
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary btn-sm">Show</a>
                            <!-- Edit Button -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
