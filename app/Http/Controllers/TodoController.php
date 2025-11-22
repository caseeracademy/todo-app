<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Auth::user()->todos()
            ->whereNull('project_id')
            ->orderBy('is_completed')
            ->orderByDesc('created_at')
            ->get();

        return view('todos.index', [
            'todos' => $todos,
            'currentProject' => null,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'project_id' => 'nullable|exists:projects,id',
        ]);

        // Verify project belongs to user if provided
        if (isset($validated['project_id'])) {
            $project = Auth::user()->projects()->find($validated['project_id']);
            if (! $project) {
                abort(403);
            }
        }

        $request->user()->todos()->create($validated);

        if (isset($validated['project_id'])) {
            return redirect()->route('projects.show', $validated['project_id']);
        }

        return redirect()->route('todos.index');
    }

    public function update(Request $request, Todo $todo)
    {
        // Ensure user owns the todo
        if ($request->user()->id !== $todo->user_id) {
            abort(403);
        }

        $todo->update([
            'is_completed' => ! $todo->is_completed,
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request, Todo $todo)
    {
        if ($request->user()->id !== $todo->user_id) {
            abort(403);
        }

        $todo->delete();

        return redirect()->back();
    }
}
