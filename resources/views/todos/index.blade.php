<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Add Todo Form -->
                    <form action="{{ route('todos.store') }}" method="POST" class="mb-8 flex gap-4">
                        @csrf
                        <input 
                            type="text" 
                            name="title" 
                            placeholder="What needs to be done?" 
                            class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-purple-500 focus:ring-purple-500 shadow-sm"
                            required
                            autofocus
                        >
                        <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition shadow-md">
                            Add
                        </button>
                    </form>

                    <!-- Todo List -->
                    <div class="space-y-4">
                        @forelse ($todos as $todo)
                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-100 dark:border-gray-700 group hover:shadow-md transition">
                                <div class="flex items-center gap-4">
                                    <form action="{{ route('todos.update', $todo) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="flex items-center justify-center w-6 h-6 rounded-full border-2 {{ $todo->is_completed ? 'bg-purple-500 border-purple-500' : 'border-gray-300 dark:border-gray-500 hover:border-purple-500' }} transition">
                                            @if ($todo->is_completed)
                                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                            @endif
                                        </button>
                                    </form>
                                    <span class="{{ $todo->is_completed ? 'text-gray-400 line-through' : 'text-gray-700 dark:text-gray-200' }} font-medium transition-colors">
                                        {{ $todo->title }}
                                    </span>
                                </div>
                                
                                <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="opacity-0 group-hover:opacity-100 transition-opacity">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-500 transition p-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="text-center py-12 text-gray-500 dark:text-gray-400">
                                <p class="text-lg">No tasks yet.</p>
                                <p class="text-sm">Add one above to get started!</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
