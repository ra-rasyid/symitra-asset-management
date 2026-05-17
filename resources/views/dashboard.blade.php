<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-white leading-tight">
                {{ __('Home / Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 bg-[#0f172a]" min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-lg font-black text-slate-400 uppercase tracking-[0.3em] mb-8 mt-2 text-center">
                HARDWARE SUMMARY
            </h3>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                
                <!-- Total Asset -->
                <div class="bg-emerald-100 p-6 rounded-3xl border border-emerald-200 shadow-sm">
                    <h3 class="text-xs uppercase tracking-widest font-black text-emerald-700 mb-6">
                        Total Asset
                    </h3>

                    <div class="space-y-3 text-slate-700 text-sm">

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-emerald-200">
                            <span>Notebook</span>
                            <span class="font-bold text-slate-900">{{ $notebookCount }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-emerald-200">
                            <span>Computer</span>
                            <span class="font-bold text-slate-900">{{ $computerCount }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-emerald-200">
                            <span>Printer</span>
                            <span class="font-bold text-slate-900">{{ $printerCount }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-emerald-200">
                            <span>Copier</span>
                            <span class="font-bold text-slate-900">{{ $copierCount }} Unit</span>
                        </div>

                    </div>
                </div>

                <!-- Stock Ready -->
                <div class="bg-blue-100 p-6 rounded-3xl border border-blue-200 shadow-sm">
                    <h3 class="text-xs uppercase tracking-widest font-black text-blue-700 mb-6">
                        Stock Ready
                    </h3>

                    <div class="space-y-3 text-slate-700 text-sm">

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-blue-200">
                            <span>Notebook</span>
                            <span class="font-bold text-slate-900">{{ $stockReadyNotebook }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-blue-200">
                            <span>Computer</span>
                            <span class="font-bold text-slate-900">{{ $stockReadyComputer }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-blue-200">
                            <span>Printer</span>
                            <span class="font-bold text-slate-900">{{ $stockReadyPrinter }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-blue-200">
                            <span>Copier</span>
                            <span class="font-bold text-slate-900">{{ $stockReadyCopier }} Unit</span>
                        </div>

                    </div>
                </div>

                <!-- Broken Asset -->
                <div class="bg-rose-100 p-6 rounded-3xl border border-rose-200 shadow-sm">
                    <h3 class="text-xs uppercase tracking-widest font-black text-rose-700 mb-6">
                        Broken Asset
                    </h3>

                    <div class="space-y-3 text-slate-700 text-sm">

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-rose-200">
                            <span>Notebook</span>
                            <span class="font-bold text-slate-900">{{ $brokenNotebook }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-rose-200">
                            <span>Computer</span>
                            <span class="font-bold text-slate-900">{{ $brokenComputer }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-rose-200">
                            <span>Printer</span>
                            <span class="font-bold text-slate-900">{{ $brokenPrinter }} Unit</span>
                        </div>

                        <div class="flex justify-between items-center rounded-2xl bg-white/70 p-4 border border-rose-200">
                            <span>Copier</span>
                            <span class="font-bold text-slate-900">{{ $brokenCopier }} Unit</span>
                        </div>

                    </div>
                </div>

            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-1">Graphic Chart</h3>
                    <p class="text-xs text-slate-500 mb-6">Condition Status</p>
                    <div class="h-[300px]">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200">
                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-1">Graphic Chart</h3>
                    <p class="text-xs text-slate-500 mb-6">Asset Category</p>
                    <div class="h-[300px]">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctxCategory = document.getElementById('categoryChart').getContext('2d');
        const ctxStatus = document.getElementById('statusChart').getContext('2d');

        const categoryData = [{{ $notebookCount }}, {{ $computerCount }}, {{ $printerCount }}, {{ $copierCount }}];
        const statusData = [{{ $conditionNormal }}, {{ $conditionMinor }}, {{ $conditionBroken }}];

        Chart.defaults.color = '#334155';
        Chart.defaults.font.family = "'Inter', sans-serif";

        new Chart(ctxCategory, {
            type: 'bar',
            data: {
                labels: ['Notebook', 'Computer', 'Printer', 'Copier'],
                datasets: [{
                    data: categoryData,
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6'],
                    borderRadius: 10,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { precision: 0 } },
                    x: { grid: { display: false } }
                }
            }
        });

        new Chart(ctxStatus, {
            type: 'doughnut',
            data: {
                labels: ['Normal', 'Minor Issue', 'Broken'],
                datasets: [{
                    data: statusData,
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                    borderWidth: 5,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: { position: 'bottom', labels: { padding: 20, usePointStyle: true } }
                }
            }
        });
    </script>
</x-app-layout>