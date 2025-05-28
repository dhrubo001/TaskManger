<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TaskManager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @livewireStyles
</head>

<body class="flex items-center justify-center min-h-screen px-4 bg-gradient-to-br from-blue-100 to-blue-300">

    @yield('content')

</body>
@livewireScripts

</html>
