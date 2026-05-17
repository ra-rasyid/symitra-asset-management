<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            /* Mencegah sidebar kedip saat reload */
            [x-cloak] { display: none !important; }
        </style>
    </head>
    
    <body class="font-sans antialiased h-full overflow-hidden bg-[#0f172a]">
    {{-- WRAPPER UTAMA: Menggunakan flex untuk membagi kolom --}}
    <div class="flex h-screen w-full overflow-hidden">
        @include('layouts.navigation')

        {{-- AREA KONTEN KANAN: flex-1 akan mengambil sisa ruang --}}
        <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden transition-all duration-300 relative z-10">
    
            @isset($header)
                <header class="bg-[#1e293b] border-b border-slate-700 shrink-0 z-10 shadow-sm">
                    <div class="w-full px-6 sm:px-10 lg:px-12 py-4">
                        <div class="flex items-center justify-between">
                            {{-- Sisi Kiri: Judul --}}
                            <div class="flex-1">
                                {{ $header }}
                            </div>

                            {{-- Sisi Kanan: User Info & Logout --}}
                            <div class="flex items-center gap-4">
                                {{-- Info User sebagai Link ke Profil --}}
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-1 bg-slate-800/50 hover:bg-slate-700/50 rounded-xl border border-slate-700 transition-all group cursor-pointer">
                                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center font-black text-white text-xs shrink-0 group-hover:scale-105 transition-transform">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <div class="hidden sm:block text-left">
                                        <p class="text-xs font-black text-white uppercase tracking-tighter leading-none group-hover:text-blue-400 transition-colors">{{ Auth::user()->name }}</p>
                                        <p class="text-[9px] text-slate-500 truncate leading-none mt-1">{{ Auth::user()->email }}</p>
                                    </div>
                                </a>

                                {{-- Tombol Logout --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="p-2 text-slate-400 hover:text-red-400 hover:bg-red-400/10 rounded-xl transition-all group" title="Logout">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">Logout</path>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </header>
            @endisset

            <main class="flex-1 overflow-y-auto bg-[#0f172a] focus:outline-none">
                <div class="w-full px-6 sm:px-10 lg:px-12 py-10">
                    <div class="w-full">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>