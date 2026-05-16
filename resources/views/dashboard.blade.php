<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <x-slot name="header">
        <h2 class="font-black text-2xl text-slate-800 dark:text-white leading-tight tracking-tight">
            {{ __('SYMITRA Control Center') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-slate-50 dark:bg-[#0f172a] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                
                <div class="bg-[#1e293b] p-6 rounded-2xl shadow-xl shadow-blue-500/10 text-white transform hover:-translate-y-1 transition-all duration-300 border border-slate-700">
                    <div class="flex justify-between items-center mb-6">
                        <div class="p-3 bg-blue-600 rounded-xl shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <span class="text-[11px] font-black uppercase tracking-[0.2em] bg-white text-slate-900 px-3 py-1 rounded-md shadow-sm">Total Assets</span>
                    </div>
                    <h2 class="text-5xl font-black tracking-tighter text-white">{{ $totalAsset }} <span class="text-sm font-bold text-slate-400 tracking-normal ml-1 uppercase">Units</span></h2>
                </div>

                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 hover:border-blue-500 transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-xs font-black text-slate-500 dark:text-slate-300 uppercase tracking-widest">Notebook & PC</p>
                        <span class="bg-blue-600 text-white text-[11px] font-bold px-3 py-1 rounded-lg shadow-md">
                            {{ $totalAsset > 0 ? number_format(($countNbPc/$totalAsset)*100, 1) : 0 }}%
                        </span>
                    </div>
                    <h2 class="text-4xl font-black text-slate-800 dark:text-white">{{ $countNbPc }}</h2>
                    <div class="mt-4 w-full bg-slate-100 dark:bg-slate-700 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $totalAsset > 0 ? ($countNbPc/$totalAsset)*100 : 0 }}%"></div>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 hover:border-emerald-500 transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-xs font-black text-slate-500 dark:text-slate-300 uppercase tracking-widest">Printer & Copier</p>
                        <div class="p-2 bg-emerald-100 dark:bg-emerald-900/50 rounded-lg">
                            <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        </div>
                    </div>
                    <h2 class="text-4xl font-black text-slate-800 dark:text-white">{{ $countPrinter }}</h2>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-2 font-black uppercase tracking-tight">Registered Devices</p>
                </div>

                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 hover:border-amber-500 transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <p class="text-xs font-black text-slate-500 dark:text-slate-300 uppercase tracking-widest">Active IPs</p>
                        <div class="p-2 bg-amber-100 dark:bg-amber-900/50 rounded-lg">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                        </div>
                    </div>
                    <h2 class="text-4xl font-black text-slate-800 dark:text-white">{{ $countIp }}</h2>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-2 font-black uppercase tracking-tight">Allocated Addresses</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-sm border border-slate-200 dark:border-slate-700">
                    <div class="flex justify-between items-center mb-8 border-b border-slate-100 dark:border-slate-700 pb-4">
                        <h3 class="text-sm font-black text-slate-800 dark:text-white uppercase tracking-[0.2em]">Hardware Distribution</h3>
                    </div>
                    <div style="position: relative; height:350px;">
                        <canvas id="hardwareChart"></canvas>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-sm border border-slate-200 dark:border-slate-700 flex flex-col items-center">
                    <h3 class="text-sm font-black text-slate-800 dark:text-white mb-8 uppercase tracking-[0.2em] self-start border-b border-slate-100 dark:border-slate-700 w-full pb-4">Composition</h3>
                    <div style="position: relative; height:280px; width: 100%;">
                        <canvas id="compositionChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        const ctxBar = document.getElementById('hardwareChart').getContext('2d');
        const ctxDoughnut = document.getElementById('compositionChart').getContext('2d');
        
        const dataCounts = [{{ $countNbPc }}, {{ $countPrinter }}, {{ $countOthers }}];

        // Konfigurasi Chart.js menyesuaikan tema
        const isDark = document.documentElement.classList.contains('dark');
        Chart.defaults.color = isDark ? '#f8fafc' : '#1e293b';
        Chart.defaults.font.weight = 'bold';
        Chart.defaults.font.family = "'Plus Jakarta Sans', 'Inter', sans-serif";

        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Notebook & PC', 'Printer', 'Others'],
                datasets: [{
                    label: 'Units',
                    data: dataCounts,
                    backgroundColor: ['#2563eb', '#10b981', '#f59e0b'],
                    borderRadius: 12,
                    barThickness: 45
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)' },
                        ticks: { font: { size: 11 } }
                    },
                    x: { grid: { display: false } }
                }
            }
        });

        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Notebook', 'Printer', 'Others'],
                datasets: [{
                    data: dataCounts,
                    backgroundColor: ['#2563eb', '#10b981', '#f59e0b'],
                    borderWidth: 0,
                    spacing: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { 
                        position: 'bottom', 
                        labels: { 
                            padding: 25, 
                            usePointStyle: true, 
                            font: { size: 12, weight: '900' } 
                        } 
                    }
                }
            }
        });
    </script>
</x-app-layout>