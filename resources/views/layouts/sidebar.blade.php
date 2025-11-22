<div class="w-64 bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 min-h-screen flex flex-col">
    <div class="p-6">
        <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">Menu</h2>
        <nav class="space-y-1">
            <a href="{{ route('todos.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('todos.index') ? 'bg-teal-50 text-teal-600 dark:bg-teal-900/20 dark:text-teal-400' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700/50' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                My Tasks
            </a>
        </nav>

        <div class="mt-8">
            <div class="flex items-center justify-between mb-4 px-1">
                <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Projects</h2>
                <a href="{{ route('projects.create') }}" class="text-slate-400 hover:text-teal-600 dark:hover:text-teal-400 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </a>
            </div>
            <nav class="space-y-1">
                @foreach(Auth::user()->projects as $project)
                    <a href="{{ route('projects.show', $project) }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ (request()->routeIs('projects.show') && request()->project->id == $project->id) ? 'bg-teal-50 text-teal-600 dark:bg-teal-900/20 dark:text-teal-400' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700/50' }} transition">
                        <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                        {{ $project->name }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>
</div>
