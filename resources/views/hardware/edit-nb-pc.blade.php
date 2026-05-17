<x-app-layout>
    <x-slot name="header">
        <h2 class="font-medium text-lg text-slate-800 dark:text-white">
            {{ __('Home / Hardware Inventory / Notebook & PC / Edit Asset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold dark:text-white mb-4 uppercase">Update Asset Information</h3>
                
                <form action="{{ route('hardware.nb-pc.update', $asset->id) }}" method="POST" class="grid grid-cols-3 gap-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm dark:text-gray-300">Item Name / Class</label>
                        <input type="text" name="item_name" value="{{ $asset->item_name }}" class="w-full rounded border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm dark:text-gray-300">Brand</label>
                        <input type="text" name="brand" value="{{ $asset->brand }}" class="w-full rounded border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm dark:text-gray-300">Model / Type</label>
                        <input type="text" name="model_type" value="{{ $asset->model_type }}" class="w-full rounded border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm dark:text-gray-300">Serial Number</label>
                        <input type="text" name="serial_number" value="{{ $asset->serial_number }}" class="w-full rounded border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm dark:text-gray-300">Mac Address</label>
                        <input type="text" name="mac_address" value="{{ $asset->mac_address }}" class="w-full rounded border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm dark:text-gray-300">Username</label>
                        <input type="text" name="username" value="{{ $asset->username }}" class="w-full rounded border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm dark:text-gray-300">Project</label>
                            <select name="project" class="w-full rounded border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                                <option value="">-- Select Project --</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->project_name }}" {{ $asset->project == $project->project_name ? 'selected' : '' }}>
                                        {{ $project->project_name }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <div>
                        <label class="block text-sm dark:text-gray-300">Location</label>
                        <select name="location" class="w-full rounded border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                            <option value="">-- Select Location --</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->location_name }}" {{ $asset->location == $location->location_name ? 'selected' : '' }}>
                                    {{ $location->location_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm dark:text-gray-300">Status</label>
                        <select name="status_id" class="w-full rounded border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                            <option value="">-- Select Status --</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ $asset->status_id == $status->id ? 'selected' : '' }}>
                                    {{ $status->status_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-3 flex gap-2">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-bold">UPDATE ASSET</button>
                        <a href="{{ route('hardware.nb-pc') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">CANCEL</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>