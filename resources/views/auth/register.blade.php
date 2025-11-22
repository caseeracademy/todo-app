<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-slate-700 dark:text-slate-300 font-medium" />
            <x-text-input id="name" class="block mt-1 w-full rounded-xl border-slate-200 dark:border-slate-700 dark:bg-slate-900 focus:border-teal-500 focus:ring-teal-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-slate-700 dark:text-slate-300 font-medium" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-slate-200 dark:border-slate-700 dark:bg-slate-900 focus:border-teal-500 focus:ring-teal-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-slate-700 dark:text-slate-300 font-medium" />

            <x-text-input id="password" class="block mt-1 w-full rounded-xl border-slate-200 dark:border-slate-700 dark:bg-slate-900 focus:border-teal-500 focus:ring-teal-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-700 dark:text-slate-300 font-medium" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl border-slate-200 dark:border-slate-700 dark:bg-slate-900 focus:border-teal-500 focus:ring-teal-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-3 bg-teal-600 border border-transparent rounded-xl font-semibold text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800 transition ease-in-out duration-150 shadow-lg shadow-teal-600/20">
                {{ __('Create Account') }}
            </button>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-slate-600 dark:text-slate-400">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-medium text-teal-600 hover:text-teal-500 dark:text-teal-400">Log in</a>
            </p>
        </div>
    </form>
</x-guest-layout>
