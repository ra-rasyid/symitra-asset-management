<x-app-layout>
    <x-slot name="header">
        <h2 class="font-medium text-lg text-slate-800 dark:text-white">
            {{ __('Home / Remote Access') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ showForm: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div x-show="showForm" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700"
                 style="display: none;">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold dark:text-white uppercase tracking-wider text-blue-600">Add Remote Access Credentials</h3>
                    <button @click="showForm = false" class="text-gray-400 hover:text-red-500 text-2xl transition">&times;</button>
                </div>
                
                @if(session('success'))
                    <div class="bg-green-500 text-white p-3 rounded-lg mb-4 shadow-sm">{{ session('success') }}</div>
                @endif

                <form action="{{ route('remote-access.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @csrf
                    <select name="device_type" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                        <option value="">-- Select Device --</option>
                        @foreach($devices as $dev)
                            <option value="{{ $dev->device_name }}">{{ $dev->device_name }}</option>
                        @endforeach
                    </select>

                    <input type="text" name="username" placeholder="Username / Owner" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    <input type="text" name="app_name" placeholder="App Name (e.g. AnyDesk, RDP)" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    <input type="text" name="device_id" placeholder="ID / Address" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    <input type="text" name="password" placeholder="Password" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                    
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
                    
                    <button type="submit" class="bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 font-bold shadow-md transition uppercase text-sm">Save Access</button>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold dark:text-white uppercase tracking-wider">Remote Access</h3>
                    
                    <div class="flex items-center gap-3">
                        <button @click="showForm = !showForm" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm shadow-md flex items-center gap-2 transition font-semibold">
                            <svg x-show="!showForm" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                            </svg>
                            <svg x-show="showForm" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span x-text="showForm ? 'Close Form' : 'Add Remote'"></span>
                        </button>

                        <button onclick="exportTableToExcel('remote-table', 'Remote-Access-List')" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-sm shadow-md flex items-center gap-2 transition font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export Excel
                        </button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table id="remote-table" class="w-full text-sm text-left border-collapse border border-gray-200 dark:border-gray-700">
                        <thead class="bg-[#1a5276] text-white uppercase text-xs">
                            <tr>
                                <th class="p-3 border border-gray-300 text-center">No.</th>
                                <th class="p-3 border border-gray-300 text-center">Type</th>
                                <th class="p-3 border border-gray-300">Username</th>
                                <th class="p-3 border border-gray-300 text-center">App Name</th>
                                <th class="p-3 border border-gray-300">ID / Address</th>
                                <th class="p-3 border border-gray-300 text-center">Password</th>
                                <th class="p-3 border border-gray-300 text-center">Project</th>
                                <th class="p-3 border border-gray-300 text-center">Location</th>
                                <th class="p-3 border border-gray-300 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-gray-200">
                            @forelse($remotes as $key => $remote)
                            <tr class="{{ $key % 2 == 0 ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-white dark:bg-gray-800' }} hover:bg-blue-50 dark:hover:bg-gray-600 transition">
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">{{ $key + 1 }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">
                                    <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded text-[10px] font-bold uppercase">{{ $remote->device_type }}</span>
                                </td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 uppercase font-medium">{{ $remote->username }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center font-bold text-indigo-600 dark:text-indigo-400">{{ $remote->app_name }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 font-mono text-blue-700 dark:text-blue-300 bg-blue-50/50 dark:bg-gray-900/30">{{ $remote->device_id }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center font-mono">{{ $remote->password }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center text-xs">{{ $remote->project }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center text-xs">{{ $remote->location }}</td>
                                <td class="p-3 border border-gray-200 dark:border-gray-700 text-center">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="{{ route('remote-access.edit', $remote->id) }}" class="text-blue-600 hover:text-blue-800 font-bold transition uppercase text-xs">EDIT</a>
                                        <form action="{{ route('remote-access.destroy', $remote->id) }}" method="POST" onsubmit="return confirm('Hapus akses remote ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-bold uppercase text-xs">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="9" class="p-6 text-center text-gray-500 italic border">Belum ada data remote access.</td></tr>
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
        var wb = XLSX.utils.table_to_book(cloneTable, { sheet: "Remote List" });
        XLSX.writeFile(wb, (filename ? filename : 'Remote-Access-Data') + '.xlsx');
    }
    </script>
</x-app-layout>