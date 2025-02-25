<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Osobní peněženka</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
<!-- ODSAZENÍ NA OSE X PRO CELÝ WEB -->
<div class="px-4 sm:px-8 lg:px-60 py-5">

    <!-- HLAVIČKA -->
    <x-header/>

    <!-- HLAVNÍ OBSAH -->
    <div class="container mx-auto mt-8">
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>

    <!-- PATA -->
    <x-footer/>
</div>
</body>
</html>
