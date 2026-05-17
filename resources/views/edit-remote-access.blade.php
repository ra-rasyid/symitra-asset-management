<x-app-layout>
    <x-slot name="header">
        <h2 class="font-medium text-lg text-slate-800 dark:text-white">
            {{ __('Home / Remote Access / Edit Asset') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold dark:text-white mb-6 uppercase tracking-wider text-blue-600">Update Remote Credentials</h3>
                
                <form action="{{ route('remote-access.update', $remote->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Device Type</label>
                        <select name="device_type" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                            @foreach($devices as $dev)
                                <option value="{{ $dev->device_name }}" {{ $remote->device_type == $dev->device_name ? 'selected' : '' }}>
                                    {{ $dev->device_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Username / Owner</label>
                        <input type="text" name="username" value="{{ $remote->username }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">App Name</label>
                        <input type="text" name="app_name" value="{{ $remote->app_name }}" placeholder="e.g. UltraViewer, AnyDesk, TeamViewer, RDP" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Device ID / Address</label>
                        <input type="text" name="device_id" value="{{ $remote->device_id }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm font-mono" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Password</label>
                        <input type="text" name="password" value="{{ $remote->password }}" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Project</label>
                            <select name="project" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                                <option value="">-- Select Project --</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->project_name }}" {{ $remote->project == $project->project_name ? 'selected' : '' }}>
                                        {{ $project->project_name }}
                                    </option>
                                @endforeach
                            </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1 uppercase text-xs">Location</label>
                        <select name="location" class="w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:text-white shadow-sm">
                            <option value="">-- Select Location --</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->location_name }}" {{ $remote->location == $location->location_name ? 'selected' : '' }}>
                                    {{ $location->location_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2 flex items-center gap-4 mt-4">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 font-bold shadow-md transition uppercase text-sm">
                            SAVE CHANGES
                        </button>
                        <a href="{{ route('remote-access') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>