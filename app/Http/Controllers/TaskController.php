<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $tasks = $query->orderBy('created_at', 'asc')->paginate(5);

        $totalTasks = Task::count();
        $completedTasks = Task::where('status', 'completed')->count();
        $trashedTasks = Task::onlyTrashed()->count();

        return view('tasks.index', compact('tasks', 'totalTasks', 'completedTasks', 'trashedTasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'priority' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'is_favorite' => false
        ]);

        return redirect('/tasks')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'priority' => 'required',
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

        return redirect('/tasks')->with('success', 'Task updated successfully!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Task moved to trash!');
    }

    public function favorite($id)
    {
        $task = Task::findOrFail($id);

        $task->is_favorite = !$task->is_favorite;
        $task->save();

        return redirect('/tasks')->with('success', 'Favorite status updated!');
    }

    public function trash()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('tasks.trash', compact('tasks'));
    }

    public function restore($id)
    {
        Task::withTrashed()->findOrFail($id)->restore();

        return redirect('/trash')->with('success', 'Task restored successfully!');
    }

    public function forceDelete($id)
    {
        Task::withTrashed()->findOrFail($id)->forceDelete();

        return redirect('/trash')->with('success', 'Task permanently deleted!');
    }
}