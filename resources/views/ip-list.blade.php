<x-app-layout>
    <x-slot name="header">
        <h2 class="font-medium text-lg text-slate-800 dark:text-white">
            {{ __('Home / IP Address List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold dark:text-white mb-4 uppercase text-blue-600">Add New IP Allocation</h3>
                
                @if(session('success'))
                    <div class="bg-green-500 text-white p-3 rounded-lg mb-4 shadow-sm">{{ session('success') }}</div>
                @endif

                <form action="{{ route('ip-list.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @csrf
                    <input type="text" name="ip_address" placeholder="IP Address (e.g. 192.168.1.10)" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    <input type="text" name="username" placeholder="Username / Owner" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    
                    <select name="department" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                        <option value="">-- Select Department --</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept->dept_name }}">{{ $dept->dept_name }} ({{ $dept->dept_code }})</option>
                        @endforeach
                    </select>

                    <select name="device" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                        <option value="">-- Select Device Type --</option>
                        @foreach($devices as $dev)
                            <option value="{{ $dev->device_name }}">{{ $dev->device_name }}</option>
                        @endforeach
                    </select>

                    <select name="location" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                        <option value="">-- Select Location --</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->location_name }}">{{ $location->location_name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="remark" placeholder="Remark" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                    
                    <button type="submit" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 col-span-1 md:col-span-3 font-bold transition shadow-md">
                        SAVE IP DATA
                    </button>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold dark:text-white uppercase tracking-wider">IP Address Directory</h3>
                    <button onclick="exportTableToExcel('ip-table', 'IP-Address-List')" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-sm shadow-md flex items-center gap-2 transition font-semibold">
                        📥 Export Excel
                    </button>
                </div>
                
                <div class="overflow-x-auto">
                    <table id="ip-table" class="w-full text-sm text-left border-collapse border border-gray-200 dark:border-gray-700">
                        <thead class="bg-[#1a5276] text-white uppercase text-xs">
                            <tr>
                                <th class="p-3 border border-gray-300">No.</th>
                                <th class="p-3 border border-gray-300">IP Address</th>
                                <th class="p-3 border border-gray-300">Username</th>
                                <th class="p-3 border border-gray-300">Department</th>
                                <th class="p-3 border border-gray-300">Device</th>
                                <th class="p-3 border border-gray-300">Location</th>
                                <th class="p-3 border border-gray-300 text-center">Remark</th>
                                <th class="p-3 border border-gray-300 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-gray-200">
                            @forelse($ips as $key => $ip)
                            <tr class="{{ $key % 2 == 0 ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-white dark:bg-gray-800' }} hover:bg-blue-50 dark:hover:bg-gray-600 transition">
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">{{ $key + 1 }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 font-mono font-bold text-blue-600 dark:text-blue-400">{{ $ip->ip_address }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 font-semibold">{{ $ip->username }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs font-bold uppercase">
                                        {{ $ip->department }}
                                    </span>
                                </td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $ip->device }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">{{ $ip->location }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-xs italic">{{ $ip->remark }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="{{ route('ip-list.edit', $ip->id) }}" class="text-blue-600 hover:text-blue-800 font-bold transition">EDIT</a>
                                        <form action="{{ route('ip-list.destroy', $ip->id) }}" method="POST" onsubmit="return confirm('Hapus data IP ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-bold uppercase transition text-xs">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="8" class="p-4 text-center text-gray-500 italic border">Belum ada data IP.</td></tr>
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
        var cloneTable = table.cloneNode(true);
        var rows = cloneTable.rows;
        for (var i = 0; i < rows.length; i++) { rows[i].deleteCell(-1); }
        var wb = XLSX.utils.table_to_book(cloneTable, { sheet: "IP List SYMITRA" });
        XLSX.writeFile(wb, (filename ? filename : 'Export-Data') + '.xlsx');
    }
    </script>
</x-app-layout>