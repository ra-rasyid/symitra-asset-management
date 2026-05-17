<aside class="w-72 bg-[#1e293b] text-white flex flex-col shrink-0 border-r border-slate-700 shadow-2xl lg:z-50 h-screen sticky top-0">
    {{-- LOGO AREA --}}
    <div class="flex items-center justify-center h-24 border-b border-slate-700 px-6 shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
            <div class="w-10 h-10 flex items-center justify-center overflow-hidden rounded-lg">
                <img src="{{ asset('images/logo-symitra.jpeg') }}" 
                    alt="SYMITRA Logo" 
                    class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
            </div>
            
            <div class="flex flex-col">
                <span class="font-black text-2xl tracking-tighter uppercase text-white leading-none">SYMITRA</span>
                <span class="text-[10px] font-medium text-slate-400 uppercase tracking-[0.15em] mt-1 leading-none">System Management IT Resource & Asset</span>
            </div>
        </a>
    </div>

    {{-- NAVIGATION AREA --}}
    <nav class="flex-1 overflow-y-auto py-6 px-4 flex flex-col gap-y-2 custom-scrollbar">
        
        {{-- 1. DASHBOARD --}}
        <a href="{{ route('dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all group {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-800' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span class="font-bold text-xs uppercase tracking-widest">Dashboard</span>
        </a>

        {{-- 2. HARDWARE INVENTORY (DROPDOWN) --}}
        <div x-data="{ open: {{ request()->routeIs('hardware.*') ? 'true' : 'false' }} }">
            <button @click="open = !open" 
                class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('hardware.*') ? 'text-white bg-slate-800/50' : 'text-slate-400 hover:bg-slate-800' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                    <span class="font-bold text-xs uppercase tracking-widest">Hardware Inventory</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" x-cloak class="mt-1 ml-4 flex flex-col gap-y-1 border-l border-slate-700">
                <a href="{{ route('hardware.nb-pc') }}" class="block px-4 py-2 text-[10px] font-black uppercase rounded-lg {{ request()->routeIs('hardware.nb-pc') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-500 hover:text-white' }}">Notebook & PC</a>
                <a href="{{ route('hardware.printer') }}" class="block px-4 py-2 text-[10px] font-black uppercase rounded-lg {{ request()->routeIs('hardware.printer') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-500 hover:text-white' }}">Printer & Copier</a>
                <a href="{{ route('hardware.others') }}" class="block px-4 py-2 text-[10px] font-black uppercase rounded-lg {{ request()->routeIs('hardware.others') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-500 hover:text-white' }}">Other Devices</a>
            </div>
        </div>

        {{-- 3. IP ADDRESS LIST --}}
        <a href="{{ route('ip-list') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('ip-list') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-800' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            <span class="font-bold text-xs uppercase tracking-widest">IP Address List</span>
        </a>

        {{-- 4. REMOTE ACCESS --}}
        <a href="{{ route('remote-access') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('remote-access') ? 'bg-blue-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-800' }}">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            <span class="font-bold text-xs uppercase tracking-widest">Remote Access</span>
        </a>

        {{-- 5. MASTER DATA (SYSTEM SETUP) --}}
        <div x-data="{ open: {{ request()->routeIs('master.*') ? 'true' : 'false' }} }" class="pt-4 mt-4 border-t border-slate-700/50">
            <span class="px-4 text-[9px] font-bold text-slate-500 uppercase tracking-widest mb-2 block"></span>
            <button @click="open = !open" 
                class="w-full flex items-center justify-between gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('master.*') ? 'text-white bg-slate-800/50' : 'text-slate-400 hover:bg-slate-800' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                    <span class="font-bold text-xs uppercase tracking-widest">Master Data</span>
                </div>
                <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div x-show="open" x-cloak class="mt-1 ml-4 flex flex-col gap-y-1 border-l border-slate-700">
                <a href="{{ route('master.location') }}" class="block px-4 py-2 text-[10px] font-black uppercase rounded-lg {{ request()->routeIs('master.location') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-500 hover:text-white' }}">- Location</a>
                <a href="{{ route('master.department') }}" class="block px-4 py-2 text-[10px] font-black uppercase rounded-lg {{ request()->routeIs('master.department') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-500 hover:text-white' }}">- Department</a>
                <a href="{{ route('master.project') }}" class="block px-4 py-2 text-[10px] font-black uppercase rounded-lg {{ request()->routeIs('master.project') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-500 hover:text-white' }}">- Project</a>
                <a href="{{ route('master.devices') }}" class="block px-4 py-2 text-[10px] font-black uppercase rounded-lg {{ request()->routeIs('master.devices') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-500 hover:text-white' }}">- Devices List</a>
                <a href="{{ route('master.status') }}" class="block px-4 py-2 text-[10px] font-black uppercase rounded-lg {{ request()->routeIs('master.status') ? 'text-blue-400 bg-blue-400/10' : 'text-slate-500 hover:text-white' }}">- Status Types</a>
            </div>
        </div>
    </nav>

    {{-- FOOTER AREA --}}
    <div class="p-4 border-t border-slate-700 bg-slate-900/30 shrink-0">
        <div class="flex flex-col gap-y-1 px-2">
            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">SYMITRA System v1.0</p>
        </div>
    </div>
</aside>