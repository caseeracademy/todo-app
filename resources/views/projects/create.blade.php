<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-800 overflow-hidden shadow-sm sm:rounded-xl border border-slate-200 dark:border-slate-700">
                <div class="p-6 text-slate-900 dark:text-slate-100">
                    <h2 class="text-xl font-bold mb-6">Create New Project</h2>
                    
                    <form action="{{ route('projects.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <x-input-label for="name" :value="__('Project Name')" class="text-slate-700 dark:text-slate-300 font-medium" />
                            <x-text-input id="name" class="block mt-1 w-full rounded-xl border-slate-200 dark:border-slate-700 dark:bg-slate-900 focus:border-teal-500 focus:ring-teal-500" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('todos.index') }}" class="text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100">Cancel</a>
                            <button type="submit" class="px-6 py-2.5 bg-teal-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800 transition ease-in-out duration-150 shadow-lg shadow-teal-600/20">
                                {{ __('Create Project') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
