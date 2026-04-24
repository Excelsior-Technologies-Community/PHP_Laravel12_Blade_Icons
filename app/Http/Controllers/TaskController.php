<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // 📋 Show all tasks
    public function index(Request $request)
    {
        $query = Task::query();

        // search
        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orwhere('description', 'like', '%' . $request->search . '%');

        }

        $tasks = $query->orderBy('created_at', 'asc')->paginate(5);

        return view('tasks.index', compact('tasks'));
    }

    // ➕ Create page
    public function create()
    {
        return view('tasks.create');
    }

    // 💾 Store task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
            'is_favorite' => false
        ]);

        return redirect('/tasks')->with('success', 'Task created successfully!');
    }

    // ✏️ Edit page
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    // 🔄 Update task
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status ?? $task->status,
        ]);

        return redirect('/tasks')->with('success', 'Task updated successfully!');
    }

    // 🗑 Soft delete
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Task moved to trash!');
    }

    // ❤️ Toggle favorite
    public function favorite($id)
    {
        $task = Task::findOrFail($id);

        $task->is_favorite = !$task->is_favorite;
        $task->save();

        return redirect('/tasks')->with('success', 'Favorite status updated!');
    }

    // 🗑 Trash list
    public function trash()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('tasks.trash', compact('tasks'));
    }

    // ♻️ Restore task
    public function restore($id)
    {
        Task::withTrashed()->findOrFail($id)->restore();

        return redirect('/trash')->with('success', 'Task restored successfully!');
    }

    // ❌ Permanent delete
    public function forceDelete($id)
    {
        Task::withTrashed()->findOrFail($id)->forceDelete();

        return redirect('/trash')->with('success', 'Task permanently deleted!');
    }
}