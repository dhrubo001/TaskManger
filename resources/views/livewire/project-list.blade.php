<div>
    <div class="mb-4">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search by project name..."
            class="w-full px-4 py-2 text-sm border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">ID</th>
                    <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Project Name</th>
                    <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Description</th>
                    <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">No Of Tasks</th>
                    <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Action</th>

                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($projects as $project)
                    <tr class="{{ $loop->index % 2 === 0 ? 'bg-[#c2d9ff]' : 'bg-[#c2ffef]' }}">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $project->id }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $project->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $project->description }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $project->tasks_count }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            <div class="flex flex-wrap gap-2">
                                <!-- Edit Button - Blue -->
                                <a href="{{ route('get.edit.project', encrypt($project->id)) }}"
                                    class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                                    Edit
                                </a>

                                <!-- Add Task Button - Green -->
                                <a href="{{ route('add.task', encrypt($project->id)) }}"
                                    class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded hover:bg-green-700">
                                    Add Task
                                </a>

                                <!-- Show Task Button - Indigo -->
                                <a href="{{ route('show.task', encrypt($project->id)) }}"
                                    class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                    Show Task
                                </a>
                            </div>

                        </td>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-sm text-center text-gray-500">
                            No projects found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
