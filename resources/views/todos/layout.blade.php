<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/76d603b2b4.js" crossorigin="anonymous"></script>
    @livewireStyles
    <title>Todos</title>
</head>
<body>
    <div class="text-center flex justify-center pt-10">
        <div class="w-1/3 border border-gray-600 rounded py-4">
            @yield('content')
        </div>
        
    </div>
    
    @livewireScripts
</body>
</html>