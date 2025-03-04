<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Osobní peněženka</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<!-- ODSAZENI NA OSE X PRO CELY WEB -->
<div class="px-60 py-5">
    <!-- HLAVICKA -->
    <x-header/>
    <!-- FLEX CELEHO BODY -->
    <div class="container mx-auto mt-8 flex flex-col md:flex-row">
        <!-- FLEX LEVE CASTI OBRAZOVKY -->
        <div class="flex flex-col items-center w-full md:w-1/4">
           <x-nav/>
        </div>
        <!-- FLEX HLAVNÍ OBSAHOVÉ ČÁSTI OBRAZOVKY -->
        <div class="flex flex-col items-center w-full pl-2 md:w-3/4">
            {{ $slot }}
            </div>
            <!-- GRID S TRANSAKCEMI TRANSAKCE -->
        </div>
    <x-footer/>
    </div>
</body>
</html>
