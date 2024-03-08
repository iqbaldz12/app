<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <input name="tasks_name" id="tasks_name" type="text" required placeholder="Task Name">
    <textarea name="description" id="description" required placeholder="Task Description"></textarea>
    <button type="submit">Create Task</button>
</form>
