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

        <form wire:submit.prevent="update" class="space-y-4">
            <div>
                <label for="name" class="block mb-1 font-medium text-gray-700">Project Name</label>
                <input type="text" id="name" wire:model.defer="name"
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="description" class="block mb-1 font-medium text-gray-700">Description</label>
                <textarea id="description" wire:model.defer="description" rows="4"
                    class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('description')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-2 font-semibold text-white transition bg-blue-600 rounded hover:bg-blue-700">
                Update Project
            </button>
        </form>
    </div>
</div>
