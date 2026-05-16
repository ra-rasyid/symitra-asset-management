<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SYMITRA - Authentication</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-tr from-slate-900 to-blue-900">
            
            <div class="text-center mb-4">
                <a href="/" class="flex flex-col items-center">
                    <div class="p-3 bg-white/10 rounded-2xl border border-white/20 mb-3 shadow-xl">
                        <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-black text-white tracking-tighter">SYMITRA</h1>
                    <p class="text-blue-300 text-[10px] uppercase tracking-[0.3em]">IT Resource & Asset</p>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-4 px-8 py-10 bg-white dark:bg-gray-800 shadow-2xl overflow-hidden sm:rounded-2xl border border-white/10">
                <div class="mb-6 text-center">
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Silakan masukkan akun Anda untuk melanjutkan ke dashboard.</p>
                </div>
                
                {{ $slot }}
            </div>

            <div class="mt-8 text-gray-400 text-xs italic">
                SYMITRA v1.0 &copy; 2026
            </div>
        </div>
    </body>
</html>