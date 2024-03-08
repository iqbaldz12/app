<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class TaskController extends Controller
{
    public function index()
    {

        $tasks = Task::get();

        return view('home', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tasks_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);


        $data = $request->only(['tasks_name', 'description']);

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tasks_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);


        $task = Task::findOrFail($id);

        $data = $request->only(['tasks_name', 'description']);

        $task->update($data);

        return redirect()->route('tasks')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $this->deleteFile($task->file);

        $task->delete();

        return redirect()->route('tasks')->with('success', 'Task deleted successfully!');
    }

    private function uploadFile($file)
    {
        $fileName = Str::random(10) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('files/tasks'), $fileName);
        return $fileName;
    }

    private function deleteFile($fileName)
    {
        $filePath = public_path('files/tasks/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
