<div>
    <div class="max-w-xl mx-auto px-4 py-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New User</h2>

        @if (session()->has('message'))
            <div class="mb-4 text-green-600">{{ session('message') }}</div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name"
                    class="mt-1 block w-full px-3 py-2 border rounded shadow-sm focus:ring focus:ring-blue-300" />
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" wire:model="email"
                    class="mt-1 block w-full px-3 py-2 border rounded shadow-sm focus:ring focus:ring-blue-300" />
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" wire:model="password"
                    class="mt-1 block w-full px-3 py-2 border rounded shadow-sm focus:ring focus:ring-blue-300" />
                @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Save
                User</button>
        </form>
    </div>

</div>
