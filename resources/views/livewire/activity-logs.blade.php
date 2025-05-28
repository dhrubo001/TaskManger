<div class="max-w-6xl mx-auto px-4 py-10">

    {{-- Back button aligned right --}}
    <div class="flex justify-end mb-6">
        <a href="{{ route('show.task', encrypt($task->project->id)) }}"
            class="inline-flex items-center justify-center px-5 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md hover:bg-blue-700 transition-all duration-150 shadow-sm">
            ← Back
        </a>
    </div>

    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Activity Logs for Task: <span
            class="text-blue-600">#{{ $task->title }}</span></h2>

    <div class="overflow-x-auto bg-white rounded-xl shadow-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-100 text-left">
                <tr>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Date</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Logged By</th>
                    <th class="px-6 py-3 text-sm font-semibold text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($logs as $log)
                    <tr class="{{ $loop->even ? 'bg-blue-50' : 'bg-teal-50' }}">
                        <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap">
                            {{ $log->created_at->format('Y-m-d H:i') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800">
                            {{ $log->createdBy->name ?? 'System' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $log->action }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-6 text-center text-sm text-gray-500 italic">
                            No activity logs found for this task.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
