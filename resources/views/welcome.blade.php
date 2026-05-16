<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYMITRA - IT Resource & Asset Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-slate-900 via-blue-950 to-black text-white overflow-hidden">
        <!-- Decorative Background Element -->
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10 pointer-events-none"></div>
        
        <div class="text-center mb-10 z-10">
            <div class="inline-block p-5 rounded-3xl bg-white/5 backdrop-blur-xl mb-8 border border-white/10 shadow-2xl animate-pulse">
                <svg class="w-24 h-24 text-blue-500 filter drop-shadow-[0_0_15px_rgba(59,130,246,0.5)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                </svg>
            </div>
            <h1 class="text-7xl font-black tracking-tighter mb-2 bg-clip-text text-transparent bg-gradient-to-b from-white to-gray-400">SYMITRA</h1>
            <p class="text-blue-400 text-sm md:text-lg uppercase tracking-[0.4em] font-semibold opacity-80">IT Resource & Asset Management</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-6 z-10">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-10 py-4 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl font-black transition-all duration-300 shadow-[0_0_20px_rgba(37,99,235,0.4)] hover:scale-105 uppercase tracking-widest text-sm">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-12 py-4 bg-white text-slate-900 hover:bg-gray-100 rounded-2xl font-black transition-all duration-300 shadow-2xl hover:scale-105 uppercase tracking-widest text-sm">
                        Log In
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-12 py-4 bg-transparent border-2 border-white/20 hover:border-white/60 hover:bg-white/5 text-white rounded-2xl font-black transition-all duration-300 uppercase tracking-widest text-sm">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <div class="mt-24 text-gray-500 text-xs font-medium tracking-widest opacity-50">
            <p>&copy; 2026 SYMITRA Version 1.0 - All Rights Reserved</p>
        </div>
    </div>
</body>
</html>