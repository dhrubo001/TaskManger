<div>
    <div class="flex justify-end max-w-md mx-auto mt-6">
        <a href="{{ route('get.dashboard') }}"
            class="px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
            Dashboard
        </a>
    </div>

    <div class="max-w-md p-6 mx-auto mt-10 bg-white rounded shadow">

        @if (session()->has('message'))
            <div class="px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
                {{ session('message') }}
            </div>
        @endif

        <div class="mt-3 p-4 bg-white rounded-2xl shadow-md">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Selected Project</label>
            <div class="text-lg font-medium text-gray-900">
                {{ $projectName }}
            </div>
        </div>





        <form wire:submit.prevent="submit" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">Task Name</label>
                <input type="text" wire:model.defer="title" class="w-full px-3 py-2 border rounded shadow-sm">
                @error('title')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Description</label>
                <textarea wire:model.defer="description" rows="4" class="w-full px-3 py-2 border rounded shadow-sm"></textarea>
                @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Status</label>
                <select wire:model.defer="status" class="w-full px-3 py-2 border rounded shadow-sm">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
                @error('status')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Assign To</label>
                <select wire:model.defer="assigned_to" class="w-full px-3 py-2 border rounded shadow-sm">
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('assigned_to')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Due Date</label>
                <input type="date" wire:model.defer="due_date" class="w-full px-3 py-2 border rounded shadow-sm">
                @error('due_date')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                Add Task
            </button>
        </form>
    </div>

</div>
