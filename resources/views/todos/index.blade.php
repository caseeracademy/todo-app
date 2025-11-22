<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="mb-10 text-center">
                <h1 class="text-3xl font-bold text-slate-900 dark:text-white tracking-tight mb-2">
                    {{ $currentProject ? $currentProject->name : 'My Tasks' }}
                </h1>
                <p class="text-slate-500 dark:text-slate-400">
                    {{ $currentProject ? 'Project Tasks' : 'Stay organized and get things done.' }}
                </p>
            </div>

            <!-- Add Todo Form -->
            <div class="mb-8 relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-200"></div>
                <form action="{{ route('todos.store') }}" method="POST" class="relative bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 flex items-center p-2">
                    @csrf
                    @if($currentProject)
                        <input type="hidden" name="project_id" value="{{ $currentProject->id }}">
                    @endif
                    <div class="pl-4 text-slate-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <input 
                        type="text" 
                        name="title" 
                        placeholder="Add a new task..." 
                        class="w-full border-0 bg-transparent text-slate-900 dark:text-white placeholder-slate-400 focus:ring-0 text-lg py-3 px-4"
                        required
                        autofocus
                        autocomplete="off"
                    >
                    <button type="submit" class="px-6 py-2.5 bg-slate-900 dark:bg-indigo-600 text-white font-medium rounded-lg hover:bg-slate-800 dark:hover:bg-indigo-500 transition shadow-lg shadow-slate-900/20 dark:shadow-indigo-600/20">
                        Add
                    </button>
                </form>
            </div>

            <!-- Todo List -->
            <div class="space-y-3">
                @forelse ($todos as $todo)
                    <div class="group flex items-center justify-between p-4 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-md hover:border-indigo-500/30 dark:hover:border-indigo-500/30 transition duration-200">
                        <div class="flex items-center gap-4 flex-1 min-w-0">
                            <form action="{{ route('todos.update', $todo) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="flex-shrink-0 flex items-center justify-center w-6 h-6 rounded-full border-2 {{ $todo->is_completed ? 'bg-indigo-500 border-indigo-500' : 'border-slate-300 dark:border-slate-600 hover:border-indigo-500 dark:hover:border-indigo-500' }} transition duration-200">
                                    @if ($todo->is_completed)
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    @endif
                                </button>
                            </form>
                            <span class="truncate text-lg {{ $todo->is_completed ? 'text-slate-400 line-through decoration-slate-300 dark:decoration-slate-600' : 'text-slate-700 dark:text-slate-200 font-medium' }} transition-all duration-200">
                                {{ $todo->title }}
                            </span>
                        </div>
                        
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-200 focus-within:opacity-100">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors" title="Delete task">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="text-center py-16">
                        <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h3 class="text-lg font-medium text-slate-900 dark:text-white mb-1">All caught up!</h3>
                        <p class="text-slate-500 dark:text-slate-400">You have no pending tasks. Enjoy your day!</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
