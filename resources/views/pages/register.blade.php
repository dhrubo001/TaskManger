@extends('layouts.auth.main')

@section('content')
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-xl ring-1 ring-gray-200">
        <h2 class="mb-6 text-3xl font-bold text-center text-blue-700">Login to Your Account</h2>

        <form method="POST" action="{{ route('post.login') }}">
            @csrf

            <!-- Firstname -->
            <div class="mb-5">
                <label for="firstname" class="block mb-1 text-sm font-medium text-gray-700">Firstname</label>
                <input id="firstname" name="firstname" type="text" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" />
                @error('firstname')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Firstname -->
            <div class="mb-5">
                <label for="lastname" class="block mb-1 text-sm font-medium text-gray-700">Lastname</label>
                <input id="lastname" name="lastname" type="text" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" />
                @error('lastname')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

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

            <!-- Password -->
            <div class="mb-5">
                <label for="confirm_password" class="block mb-1 text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <input id="confirm_password" name="confirm_password" type="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500" />
                @error('confirm_password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>



            <!-- Submit Button -->
            <button type="submit"
                class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Sign Up
            </button>

            <!-- Register Link -->
            <p class="mt-6 text-sm text-center text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
            </p>
        </form>
    </div>
@endsection
