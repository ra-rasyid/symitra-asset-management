<x-app-layout>
    <x-slot name="header">
        <h2 class="font-medium text-lg text-slate-800 dark:text-white uppercase tracking-tight">
            {{ __('Home / Master Data / Projects') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ showForm: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded-lg mb-4 shadow-sm text-sm font-bold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div x-show="showForm" 
                 x-cloak 
                 x-transition 
                 class="bg-white dark:bg-gray-800 p-6 mb-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-blue-600 font-black uppercase tracking-widest text-sm">Add New Project</h3>
                    <button @click="showForm = false" class="text-gray-400 hover:text-red-500 transition">&times;</button>
                </div>
                
                <form action="{{ route('master.project.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    <input type="text" name="project_name" placeholder="Project Name (e.g. Mahakam Project)" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-blue-500" required>
                    <button type="submit" class="bg-blue-600 text-white p-2 rounded-lg font-black uppercase text-xs hover:bg-blue-700 transition shadow-md">
                        Save Project
                    </button>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold dark:text-white uppercase tracking-widest text-sm text-slate-500">Project Directory</h3>
                    <div class="flex gap-3 ml-auto">
                        <button @click="showForm = !showForm" class="bg-blue-600 text-white py-2 px-4 rounded-lg text-xs font-black transition flex items-center gap-2 shadow-md hover:bg-blue-700">
                            <span x-text="showForm ? '✖ CLOSE' : '➕ ADD PROJECT'"></span>
                        </button>
                        <button onclick="exportTableToExcel('project-table', 'Master-Projects')" class="bg-green-600 text-white py-2 px-4 rounded-lg text-xs font-black flex items-center gap-2 shadow-md hover:bg-green-700 transition">
                            📥 EXPORT EXCEL
                        </button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table id="project-table" class="w-full text-sm text-left border-collapse border border-gray-200 dark:border-gray-700">
                        <thead class="bg-[#1a5276] text-white uppercase text-[11px] tracking-widest font-black">
                            <tr>
                                <th class="p-3 border border-gray-300 text-center w-16">No.</th>
                                <th class="p-3 border border-gray-300 uppercase">Project Name</th>
                                <th class="p-3 border border-gray-300 text-center w-40 uppercase tracking-widest">Action</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-gray-200">
                            @forelse($projects as $key => $project)
                            <tr class="{{ $key % 2 == 0 ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-white dark:bg-gray-800' }} hover:bg-blue-50 dark:hover:bg-gray-600 transition">
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">{{ $key + 1 }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 font-bold uppercase">{{ $project->project_name }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">
                                    <form action="{{ route('master.project.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-black uppercase text-[10px] tracking-widest transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="p-10 text-center text-gray-500 italic border border-gray-200 dark:border-gray-700 uppercase tracking-widest text-xs">
                                    No project data found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPT EXCEL --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
    function exportTableToExcel(tableID, filename = '') {
        var table = document.getElementById(tableID);
        if (!table) return;

        var cloneTable = table.cloneNode(true);
        var rows = cloneTable.rows;
        for (var i = 0; i < rows.length; i++) {
            rows[i].deleteCell(-1); // Hapus kolom Action
        }

        var wb = XLSX.utils.table_to_book(cloneTable, { sheet: "Projects" });
        XLSX.writeFile(wb, (filename ? filename : 'Master-Projects') + '.xlsx');
    }
    </script>
</x-app-layout>