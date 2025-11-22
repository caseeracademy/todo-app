<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $request->user()->projects()->create($validated);

        return redirect()->route('todos.index');
    }

    public function show(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $todos = $project->todos()->orderBy('is_completed')->orderByDesc('created_at')->get();
        
        return view('todos.index', [
            'todos' => $todos,
            'currentProject' => $project,
        ]);
    }
}
