<div>
    <div class="max-w-6xl mx-auto px-4 py-10">

        {{-- Top bar --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0 md:space-x-4">

            {{-- Dashboard Button --}}
            <a href="{{ route('get.dashboard') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                Dashboard
            </a>

            {{-- Search Input --}}
            <input type="text" wire:model.live.debounce.500ms="searchTerm" placeholder="Search task title..."
                class="px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 w-full md:w-64">

            {{-- Filter Dropdown --}}
            <div class="flex items-center space-x-2">
                <label for="statusFilter" class="text-sm font-medium text-gray-700">Filter by:</label>
                <select wire:model.live="statusFilter" wire:change="loadTasks" id="statusFilter"
                    class="px-3 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All</option>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
        </div>

        {{-- Filter Tag --}}
        @if ($statusFilter)
            <div class="mb-4">
                <span
                    class="inline-block px-4 py-2 text-sm font-medium text-red-600 bg-red-100 border border-red-200 rounded-lg shadow-sm">
                    Filter: <span class="font-semibold text-red-700">{{ ucfirst($statusFilter) }}</span>
                </span>
            </div>
        @endif

        {{-- Tasks Table --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-100">
                    <tr>
                        <th colspan="6" class="px-6 py-3 text-left text-lg font-semibold text-gray-800">
                            All Tasks Under - <span class="text-blue-600">{{ $projectName }}</span>
                        </th>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">ID</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Task Name</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Description</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Assigned To</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Status</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($tasks as $task)
                        <tr class="{{ $loop->even ? 'bg-blue-50' : 'bg-teal-50' }}">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $task->id }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $task->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $task->description }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $task->assignedTo->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ ucfirst($task->status) }}</td>
                            <td class="px-6 py-4 space-x-2">
                                {{-- Toggle Status Button --}}
                                <button wire:click="toggleStatus({{ $task->id }})"
                                    class="inline-block px-4 py-2 text-xs font-medium text-white rounded transition
                                        {{ $task->status === 'completed' ? 'bg-green-600 hover:bg-green-700' : 'bg-yellow-500 hover:bg-yellow-600' }}">
                                    {{ $task->status === 'completed' ? 'Mark as Pending' : 'Mark as Completed' }}
                                </button>

                                {{-- Logs Button --}}
                                <a href="{{ route('show.task.activity.log', encrypt($task->id)) }}"
                                    class="mt-2 inline-block px-4 py-2 text-xs font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700 transition">
                                    Logs
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-sm text-gray-500 italic">
                                No tasks found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
