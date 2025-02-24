<!-- HLAVICKA -->
<header class="flex bg-blue-500 text-white shadow rounded-lg">
    <div class="container mx-auto flex items-center py-5 px-4 space-x-4">
        <!-- Logo -->
        <div class="w-16 h-16 flex items-center justify-center bg-white rounded-full shadow">
            <img alt="logo" src="{{ asset('img/logo.png') }}" class="w-10 h-10 object-contain">
        </div>
        <!-- Hlavní nadpis -->
        <h1 class="text-3xl font-bold tracking-wide">Spravujte své finance s přehledem</h1>
    </div>
    <div class="relative flex items-center justify-end w-1/3 pr-6" x-data="{ open: false }">
        <!-- Ikona uživatele -->
        <button @click="open = !open"
                class="flex items-center space-x-2 bg-white text-blue-500 px-4 py-2 rounded-full hover:bg-blue-100 transition">
            <span class="material-icons text-blue-500">account_circle</span>
            <span>Jan Zítko</span>
        </button>
        <!-- Dropdown menu (posunuté doprava) -->
        <div x-show="open" @click.away="open = false"
             class="absolute left-full ml-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md z-50">
            <ul class="py-2">
                <!-- Položka Nastavení -->
                <li>
                    <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <span class="material-icons text-gray-500 mr-2">settings</span> Nastavení
                    </a>
                </li>
                <hr class="border-gray-200">
                <!-- Položka Odhlásit se -->
                <li>
                    <button class="flex w-full items-center px-4 py-2 text-red-600 hover:bg-red-100">
                        <span class="material-icons text-red-500 mr-2">logout</span> Odhlásit se
                    </button>
                </li>
            </ul>
        </div>
    </div>
</header>
