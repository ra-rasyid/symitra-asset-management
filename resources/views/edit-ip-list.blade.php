<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit IP Address - ') . $ip->ip_address }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold dark:text-white mb-6 uppercase tracking-wider text-blue-600">Update IP Allocation</h3>
                
                <form action="{{ route('ip-list.update', $ip->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">IP Address</label>
                        <input type="text" name="ip_address" value="{{ $ip->ip_address }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm font-mono" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Username / Owner</label>
                        <input type="text" name="username" value="{{ $ip->username }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Department</label>
                        <select name="department" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->dept_name }}" {{ $ip->department == $dept->dept_name ? 'selected' : '' }}>
                                    {{ $dept->dept_name }} ({{ $dept->dept_code }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Device Type</label>
                        <select name="device" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                            @foreach($devices as $dev)
                                <option value="{{ $dev->device_name }}" {{ $ip->device == $dev->device_name ? 'selected' : '' }}>
                                    {{ $dev->device_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Location</label>
                        <select name="location" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                            <option value="">-- Select Location --</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->location_name }}" {{ $ip->location == $location->location_name ? 'selected' : '' }}>
                                    {{ $location->location_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Remark</label>
                        <textarea name="remark" rows="1" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">{{ $ip->remark }}</textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center gap-4 mt-4">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-bold shadow-md transition uppercase text-sm">
                            UPDATE IP DATA
                        </button>
                        <a href="{{ route('ip-list') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm">
                            Cancel & Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>