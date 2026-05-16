<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hardware Inventory - Other Devices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold dark:text-white mb-4 uppercase tracking-wider text-blue-600">Add New Other Device</h3>
                
                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded-lg mb-4 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded-lg mb-4 shadow-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('hardware.others.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @csrf
                    <input type="text" name="item_name" placeholder="Item Name / Class (e.g. Router, Switch)" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    <input type="text" name="brand" placeholder="Brand" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    <input type="text" name="model_type" placeholder="Model / Type" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    <input type="text" name="serial_number" placeholder="Serial Number" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    <input type="text" name="mac_address" placeholder="Mac Address / Host Name" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                    <input type="text" name="username" placeholder="Username / PIC" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                        <select name="project" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                            <option value="">-- Select Project --</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                            @endforeach
                        </select>
                    <select name="location" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                        <option value="">-- Select Location --</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->location_name }}">{{ $location->location_name }}</option>
                        @endforeach
                    </select>
                    <textarea name="remark" placeholder="Remark" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm md:col-span-1"></textarea>
                    
                    <button type="submit" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 md:col-span-3 font-bold transition shadow-md">
                        SAVE DEVICE
                    </button>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold dark:text-white uppercase tracking-wider">Other Devices List</h3>
                    <button onclick="exportTableToExcel('others-table', 'Inventory-Other-Devices')" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-sm shadow-md flex items-center gap-2 transition font-semibold">
                        📥 Export Excel
                    </button>
                </div>
                
                <div class="overflow-x-auto">
                    <table id="others-table" class="w-full text-sm text-left border-collapse border border-gray-200 dark:border-gray-700">
                        <thead class="bg-[#1a5276] text-white uppercase text-xs">
                            <tr>
                                <th class="p-3 border border-gray-300">No.</th>
                                <th class="p-3 border border-gray-300">Item Name</th>
                                <th class="p-3 border border-gray-300">Brand</th>
                                <th class="p-3 border border-gray-300">Model / Type</th>
                                <th class="p-3 border border-gray-300">Serial Number</th>
                                <th class="p-3 border border-gray-300">Mac Address</th>
                                <th class="p-3 border border-gray-300">Username</th>
                                <th class="p-3 border border-gray-300">Project</th>
                                <th class="p-3 border border-gray-300">Location</th>
                                <th class="p-3 border border-gray-300">Remark</th>
                                <th class="p-3 border border-gray-300 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-gray-300">
                            @forelse($assets as $key => $asset)
                            <tr class="{{ $key % 2 == 0 ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-white dark:bg-gray-800' }} hover:bg-blue-50 dark:hover:bg-gray-600 transition">
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">{{ $key + 1 }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 font-bold">{{ $asset->item_name }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $asset->brand }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $asset->model_type }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 font-mono text-blue-600 dark:text-blue-400">{{ $asset->serial_number }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $asset->mac_address }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $asset->username }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $asset->project }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $asset->location }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-xs italic">{{ $asset->remark }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="{{ route('hardware.others.edit', $asset->id) }}" class="text-blue-600 hover:text-blue-800 font-bold transition">
                                            EDIT
                                        </a>

                                        <form action="{{ route('hardware.others.destroy', $asset->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus device ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-bold uppercase transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="11" class="p-6 text-center text-gray-500 italic">No devices found in the database.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
    function exportTableToExcel(tableID, filename = '') {
        var table = document.getElementById(tableID);
        
        // Pastikan tabel ditemukan
        if (!table) {
            alert('Tabel tidak ditemukan!');
            return;
        }

        // Clone tabel agar tidak merusak tampilan di web
        var cloneTable = table.cloneNode(true);
        
        // Hapus kolom terakhir (Action) di setiap baris
        var rows = cloneTable.rows;
        for (var i = 0; i < rows.length; i++) {
            rows[i].deleteCell(-1); 
        }

        // Proses konversi ke XLSX
        var wb = XLSX.utils.table_to_book(cloneTable, { sheet: "SYMITRA Data" });
        
        // Nama file
        var finalFileName = filename ? filename + '.xlsx' : 'Export_SYMITRA.xlsx';

        // Download
        XLSX.writeFile(wb, finalFileName);
    }
    </script>
</x-app-layout>