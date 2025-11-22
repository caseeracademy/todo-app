<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todos()->latest()->get();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $request->user()->todos()->create($validated);

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
