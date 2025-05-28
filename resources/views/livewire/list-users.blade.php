<div>
    <!-- Container with max-width and margin auto for centering -->
    <div class="max-w-6xl mx-auto px-4 py-6">

        <!-- Flex container for the button, justify-end to push it right -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('get.dashboard') }}"
                class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                Dashboard
            </a>
        </div>

        <h2 class="text-2xl font-semibold text-gray-800 mb-4">User List</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">ID</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Name</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Email</th>
                        <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">Created At</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($users as $user)
                        <tr class="{{ $loop->even ? 'bg-blue-50' : 'bg-teal-50' }}">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $loop->index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
