<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-slate-700 dark:text-slate-300 font-medium" />
            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-slate-200 dark:border-slate-700 dark:bg-slate-900 focus:border-teal-500 focus:ring-teal-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-slate-700 dark:text-slate-300 font-medium" />

            <x-text-input id="password" class="block mt-1 w-full rounded-xl border-slate-200 dark:border-slate-700 dark:bg-slate-900 focus:border-teal-500 focus:ring-teal-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 dark:border-slate-700 text-teal-600 shadow-sm focus:ring-teal-500 dark:focus:ring-teal-600 dark:focus:ring-offset-slate-800" name="remember">
                <span class="ms-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-slate-600 dark:text-slate-400 hover:text-teal-600 dark:hover:text-teal-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 dark:focus:ring-offset-slate-800" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-teal-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800 transition ease-in-out duration-150 shadow-lg shadow-teal-600/20">
                {{ __('Log in') }}
            </button>
        </div>
        
        <div class="text-center mt-6">
            <p class="text-sm text-slate-600 dark:text-slate-400">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400">Sign up</a>
            </p>
        </div>
    </form>
</x-guest-layout>
