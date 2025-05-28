<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="min-h-screen bg-gray-100">

    <!-- Top Header -->
    <header class="bg-white shadow-md">
        <div class="container flex items-center justify-between px-4 py-4 mx-auto">
            <!-- Logo -->
            <div class="text-xl font-bold text-blue-700">
                <a href="{{ route('get.dashboard') }}">📝 TaskManager</a>
            </div>


            <a href='{{ route('get.logout') }}'
                class="px-4 py-2 text-sm font-semibold text-white transition duration-200 bg-red-500 rounded hover:bg-red-600">
                Logout
            </a>
        </div>
    </header>
    <div class="w-full overflow-x-auto">
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
