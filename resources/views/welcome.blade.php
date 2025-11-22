<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Todo App') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="antialiased bg-white text-slate-900 dark:bg-slate-900 dark:text-slate-100">
    
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">T</div>
                    <span class="font-bold text-xl tracking-tight">Todo<span class="text-teal-600">App</span></span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-sm font-medium text-slate-600 hover:text-teal-600 dark:text-slate-400 dark:hover:text-teal-400 transition">Features</a>
                    <a href="#testimonials" class="text-sm font-medium text-slate-600 hover:text-teal-600 dark:text-slate-400 dark:hover:text-teal-400 transition">Testimonials</a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-teal-600 hover:text-teal-500 dark:text-teal-400 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-teal-600 dark:text-slate-400 dark:hover:text-teal-400 transition">Log in</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-full bg-teal-600 text-white text-sm font-semibold hover:bg-teal-700 transition shadow-lg shadow-teal-600/20">Get Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full z-[-1]">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-green-500/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-teal-50 dark:bg-teal-900/30 text-teal-600 dark:text-teal-400 text-xs font-semibold uppercase tracking-wide mb-8 border border-teal-100 dark:border-teal-800">
                <span class="w-2 h-2 rounded-full bg-teal-600 animate-pulse"></span>
                New Version 2.0
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 text-slate-900 dark:text-white">
                Master your day with <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-green-600">effortless focus</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-600 dark:text-slate-400 mb-10">
                The minimal, powerful todo list designed for high-performers. Capture ideas, organize tasks, and achieve your goals without the clutter.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-4 rounded-full bg-teal-600 text-white font-bold text-lg hover:bg-teal-700 transition shadow-xl shadow-teal-600/20 hover:-translate-y-1">
                    Start for free
                </a>
                <a href="#demo" class="px-8 py-4 rounded-full bg-white dark:bg-slate-800 text-slate-900 dark:text-white font-bold text-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition hover:-translate-y-1">
                    View Demo
                </a>
            </div>

            <!-- App Preview -->
            <div class="mt-20 relative mx-auto max-w-5xl rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 overflow-hidden transform rotate-1 hover:rotate-0 transition duration-500">
                <div class="absolute top-0 w-full h-10 bg-slate-50 dark:bg-slate-800 flex items-center px-4 gap-2 border-b border-slate-200 dark:border-slate-700">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                    <div class="mx-auto text-xs font-medium text-slate-400">todo-app.com</div>
                </div>
                <div class="p-8 pt-16 text-left grid gap-4">
                    <!-- Mock Tasks -->
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700/50 group hover:border-teal-500/30 transition">
                        <div class="w-6 h-6 rounded-full border-2 border-teal-500 flex items-center justify-center bg-teal-500 text-white">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span class="text-slate-400 line-through decoration-slate-400/50 font-medium">Draft Q4 marketing strategy</span>
                    </div>
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm group hover:border-teal-500 transition cursor-pointer">
                        <div class="w-6 h-6 rounded-full border-2 border-slate-300 dark:border-slate-600 group-hover:border-teal-500 transition"></div>
                        <span class="font-medium text-slate-700 dark:text-slate-200">Review design mockups with team</span>
                        <span class="ml-auto text-xs font-medium px-2 py-1 rounded-md bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400">High Priority</span>
                    </div>
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-sm group hover:border-teal-500 transition cursor-pointer">
                        <div class="w-6 h-6 rounded-full border-2 border-slate-300 dark:border-slate-600 group-hover:border-teal-500 transition"></div>
                        <span class="font-medium text-slate-700 dark:text-slate-200">Prepare quarterly financial report</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Grid -->
    <div id="features" class="py-24 bg-slate-50 dark:bg-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-white mb-4">Everything you need to stay organized</h2>
                <p class="text-lg text-slate-600 dark:text-slate-400">Simple enough for personal use, powerful enough for work. We've stripped away the clutter to focus on speed.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-teal-100 dark:bg-teal-900/50 rounded-xl flex items-center justify-center text-teal-600 dark:text-teal-400 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Lightning Fast</h3>
                    <p class="text-slate-600 dark:text-slate-400">Built for speed. Add, edit, and complete tasks in milliseconds without page reloads.</p>
                </div>
                <div class="p-8 bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-green-100 dark:bg-green-900/50 rounded-xl flex items-center justify-center text-green-600 dark:text-green-400 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Secure by Default</h3>
                    <p class="text-slate-600 dark:text-slate-400">Your data is encrypted and private. We never sell your information to third parties.</p>
                </div>
                <div class="p-8 bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-xl flex items-center justify-center text-blue-600 dark:text-blue-400 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Focus Mode</h3>
                    <p class="text-slate-600 dark:text-slate-400">Distraction-free interface helps you concentrate on one task at a time.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-teal-600 rounded-md flex items-center justify-center text-white font-bold text-xs">T</div>
                <span class="font-bold text-lg text-slate-900 dark:text-white">TodoApp</span>
            </div>
            <div class="text-slate-500 text-sm">
                &copy; {{ date('Y') }} Todo App Inc. All rights reserved.
            </div>
            <div class="flex gap-6">
                <a href="#" class="text-slate-400 hover:text-teal-600 transition"><span class="sr-only">Twitter</span><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg></a>
                <a href="#" class="text-slate-400 hover:text-teal-600 transition"><span class="sr-only">GitHub</span><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg></a>
            </div>
        </div>
    </footer>
</body>
</html>
