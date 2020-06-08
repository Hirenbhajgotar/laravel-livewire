<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire | Laravel 7</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    {{-- @livewireStyles --}}
    <livewire:styles>
    <livewire:scripts>
</head>

<body>
    @yield('content')
    

    {{-- @livewireScripts --}}
</body>

</html>