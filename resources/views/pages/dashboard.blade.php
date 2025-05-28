@extends('layouts.pages.main')
@section('content')
    <!-- Projects Table -->
    <div class="container px-4 py-6 mx-auto">
        <div class="flex flex-col gap-2 mb-2 sm:flex-row">
            <a href="{{ route('get.add.project') }}"
                class="px-4 py-2 text-center text-white transition bg-blue-600 rounded hover:bg-blue-700">
                Add Project
            </a>

            <a href="{{ route('get.add.user') }}"
                class="px-4 py-2 text-center text-white transition bg-green-600 rounded hover:bg-green-700">
                Add User
            </a>

            <a href="{{ route('get.list.users') }}"
                class="px-4 py-2 text-center text-white bg-purple-600 rounded hover:bg-purple-700">
                List Users
            </a>
        </div>

        @include('layouts.info.message')

        <livewire:project-list />
    </div>
@endsection
