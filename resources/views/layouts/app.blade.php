<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Repository</title>

    @vite('resources/css/app.css')

    @yield('styles')
</head>
<body>
    <div class="bg-[#212121] text-[#eff]">
        @yield('content')

        @yield('scripts')
    </div>
</body>
</html>