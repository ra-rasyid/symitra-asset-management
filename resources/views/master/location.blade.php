<x-app-layout>
    <x-slot name="header">
        <h2 class="font-medium text-lg text-slate-800 dark:text-white">
            {{ __('Home / Master Data / Locations') }}
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
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700"
                 style="display: none;">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold dark:text-white uppercase tracking-wider text-blue-600">Add New Location</h3>
                    <button @click="showForm = false" class="text-gray-400 hover:text-red-500 text-2xl transition">&times;</button>
                </div>

                <form action="{{ route('master.location.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @csrf
                    <input type="text" name="location_name" placeholder="Location Name (e.g. Site Project - Handil)" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    
                    <button type="submit" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 font-bold transition shadow-md uppercase text-sm text-center">
                        Save Location
                    </button>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold dark:text-white uppercase tracking-wider">Location Directory</h3>
                    
                    <div class="flex items-center gap-3 ml-auto">
                        <button @click="showForm = !showForm" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm shadow-md flex items-center gap-2 transition font-semibold text-center">
                            <svg x-show="!showForm" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                            </svg>
                            <svg x-show="showForm" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span x-text="showForm ? 'Close Form' : 'Add Location'"></span>
                        </button>

                        <button onclick="exportTableToExcel('location-table', 'Master-Locations')" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-sm shadow-md flex items-center gap-2 transition font-semibold text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export Excel
                        </button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table id="location-table" class="w-full text-sm text-left border-collapse border border-gray-200 dark:border-gray-700">
                        <thead class="bg-[#1a5276] text-white uppercase text-[11px] tracking-wider">
                            <tr>
                                <th class="p-3 border border-gray-300 text-center w-16 uppercase">No.</th>
                                <th class="p-3 border border-gray-300 uppercase">Location Name</th>
                                <th class="p-3 border border-gray-300 text-center w-48 uppercase">Created At</th>
                                <th class="p-3 border border-gray-300 text-center w-40 uppercase tracking-widest">Action</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-gray-200">
                            @forelse($locations as $key => $loc)
                            <tr class="{{ $key % 2 == 0 ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-white dark:bg-gray-800' }} hover:bg-blue-50 dark:hover:bg-gray-600 transition">
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">{{ $key + 1 }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 font-bold uppercase">{{ $loc->location_name }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center text-[11px] text-slate-500 dark:text-slate-400">
                                    {{ $loc->created_at ? $loc->created_at->format('d M Y, H:i') : '-' }}
                                </td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">
                                    <div class="flex justify-center items-center gap-4 text-[11px]">
                                        <form action="{{ route('master.location.destroy', $loc->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-black tracking-widest uppercase transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-500 italic border border-gray-200 dark:border-gray-700 uppercase tracking-widest text-xs">
                                    Belum ada data lokasi.
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

        var wb = XLSX.utils.table_to_book(cloneTable, { sheet: "Master Locations" });
        var finalFileName = (filename ? filename : 'Master-Location') + '.xlsx';
        XLSX.writeFile(wb, finalFileName);
    }
    </script>
</x-app-layout>