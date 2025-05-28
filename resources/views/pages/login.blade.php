@extends('layouts.auth.main')
@section('content')
    <div class="flex flex-col items-center justify-center w-full min-h-screen px-4 sm:px-6 lg:px-8">

        <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-xl ring-1 ring-gray-200">
            <h2 class="mb-6 text-3xl font-bold text-center text-blue-700">Login As Admin</h2>

            <form method="POST" action="{{ route('post.login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email Address</label>
                    <input id="email" name="email" type="email" required autofocus
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" />
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" />
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Sign In
                </button>
            </form>
        </div>

        <!-- Admin Credentials Display -->
        <div class="w-full max-w-md p-5 mt-6 text-sm text-gray-700 border border-gray-200 shadow-sm bg-gray-50 rounded-xl">
            <h3 class="mb-2 font-semibold text-blue-600">Default Admin Credentials</h3>
            <ul class="space-y-1">
                <li><strong>Email:</strong> admin@admin.com</li>
                <li><strong>Password:</strong> 12345678</li>
            </ul>
            <p class="mt-3 text-xs italic text-gray-500">Use these credentials to log in for the first time. You can change
                them after logging in.</p>
        </div>
    </div>
@endsection
