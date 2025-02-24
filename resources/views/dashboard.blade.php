<x-layouts.app>

    <!-- FLEX HLAVNÍ OBSAHOVÉ ČÁSTI OBRAZOVKY -->
    <div class="flex flex-col items-center w-full pl-2">

        <!-- FORMULÁŘ NA PŘIDÁNÍ TRANSAKCE S ALPINE.JS -->
        <div x-data="{ showForm: false }" class="bg-white shadow-md w-full p-2 rounded-lg relative">
            <!-- Tlačítko pro otevření formuláře (vpravo nahoře) -->
            <button @click="showForm = !showForm"
                    class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-lg shadow-lg hover:scale-105 transition-transform flex items-center">
                <span class="material-icons text-white mr-2">open_in_full</span>
                Otevřít formulář
            </button>

            <!-- Formuláře pro přidání transakcí -->
            <div x-show="showForm" x-transition class="mt-2">
                <div class="transaction-form hidden" id="form-output">
                    <!-- Formulář pro výdaje-->
                    <form class="bg-gray-100 p-4 rounded-lg" novalidate onsubmit="return validateForm()">
                        <!-- Horní řada -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center">
                            <!-- Datum transakce -->
                            <div>
                                <label for="dateOutput" class="block text-sm font-medium text-gray-700">Datum
                                    transakce</label>
                                <input type="date" id="dateOutput" name="dateOutput" required
                                       class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                            </div>
                            <!-- Kategorie -->
                            <div class="relative inline-block text-left w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kategorie</label>
                                <div x-data="{ open: false, query: '', items: [
        { name: 'Jídlo', icon: 'restaurant', color: 'blue', isCategory: true },
        { name: 'Restaurace', parent: 'Jídlo', isCategory: false },
        { name: 'Fast Food', parent: 'Jídlo', isCategory: false },
        { name: 'Nákup potravin', parent: 'Jídlo', isCategory: false },
        { name: 'Doprava', icon: 'directions_bus', color: 'green', isCategory: true },
        { name: 'MHD', parent: 'Doprava', isCategory: false },
        { name: 'Auto', parent: 'Doprava', isCategory: false },
        { name: 'Vlak', parent: 'Doprava', isCategory: false },
    ], filteredItems: [], selected: '' }"
                                     x-init="filteredItems = items" class="relative">
                                    <!-- Tlačítko pro otevření dropdownu -->
                                    <!-- Výběr kategorie (Button) -->
                                    <button @click="open = !open" type="button"
                                            class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2 bg-white text-gray-700 flex justify-between items-center">
                                        <span x-text="selected || 'Vyberte kategorii'"></span>
                                        <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 01.02-1.06z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div x-show="open" @click.away="open = false"
                                         class="absolute z-10 mt-2 w-full rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <!-- Vyhledávací pole -->
                                        <div class="p-2">
                                            <input type="text" x-model="query"
                                                   @input="filteredItems = items.filter(item => item.name.toLowerCase().includes(query.toLowerCase()))"
                                                   placeholder="Vyhledávejte kategorie..."
                                                   class="w-full rounded-md border-gray-300 shadow-sm px-4 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <!-- Filtrované položky -->
                                        <ul class="py-1 max-h-64 overflow-y-auto">
                                            <template x-for="item in filteredItems" :key="item.name">
                                                <li @click="selected = item.name; open = false"
                                                    class="flex items-center gap-2 cursor-pointer px-4 py-2 text-sm"
                                                    :class="item.isCategory ? `text-${item.color}-700 font-semibold hover:bg-${item.color}-50` : 'text-gray-700 hover:bg-gray-100'">
                                                    <template x-if="item.isCategory">
                                                    <span class="material-icons" :class="`text-${item.color}-500`"
                                                          x-text="item.icon"></span>
                                                    </template>
                                                    <span x-text="item.name"></span>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Účet -->
                            <div>
                                <label for="accountOutput"
                                       class="block text-sm font-medium text-gray-700">Účet</label>
                                <select id="accountOutput" name="accountOutput" required
                                        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                                    <option>ČSOB Premium</option>
                                    <option>Air Bank</option>
                                    <option>Spořicí účet</option>
                                </select>
                            </div>
                            <!-- Tlačítko Přidat transakci -->
                            <div class="flex items-center justify-center mt-5">
                                <button type="submit"
                                        class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-lg shadow-lg hover:scale-105 transition-transform flex items-center">
                                    <span class="material-icons text-white mr-2">add_circle</span>
                                    Vložit výdaj
                                </button>
                            </div>
                        </div>
                        <!-- Spodní řada -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center mt-2">
                            <!-- Částka -->
                            <div>
                                <label for="amountOutput"
                                       class="block text-sm font-medium text-gray-700">Částka</label>
                                <input type="number" step="0.01" id="amountOutput" name="amountOutput" required
                                       class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2"
                                       placeholder="0.00">
                            </div>

                            <!-- Měna -->
                            <div>
                                <label for="currencyOutput"
                                       class="block text-sm font-medium text-gray-700">Měna</label>
                                <select id="currencyOutput" name="currencyOutput" required
                                        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                                    <option selected>Kč</option>
                                    <option>€</option>
                                    <option>$</option>
                                </select>
                            </div>
                            <!-- Poznámka -->
                            <div class="col-span-2">
                                <label for="noteOutput"
                                       class="block text-sm font-medium text-gray-700">Poznámka</label>
                                <textarea id="noteOutput" name="noteOutput" rows="2"
                                          class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2"
                                          placeholder="Zadejte poznámku..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="transaction-form hidden" id="form-income">
                    <!-- Formulář pro příjmy -->
                    <form class="bg-gray-100 p-4 rounded-lg" novalidate onsubmit="return validateForm()">
                        <!-- Horní řada -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center">
                            <!-- Datum transakce -->
                            <div>
                                <label for="dateIncome" class="block text-sm font-medium text-gray-700">Datum
                                    transakce</label>
                                <input type="date" id="dateIncome" name="dateIncome" required
                                       class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                            </div>
                            <!-- Kategorie -->
                            <div class="relative inline-block text-left w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kategorie</label>
                                <div x-data="{ open: false, query: '', items: [
        { name: 'Mzda', parent: 'Jídlo', isCategory: false },
        { name: 'Důchod', parent: 'Jídlo', isCategory: false },
        { name: 'Ostatní', parent: 'Jídlo', isCategory: false },
    ], filteredItems: [], selected: '' }"
                                     x-init="filteredItems = items" class="relative">
                                    <!-- Tlačítko pro otevření dropdownu -->
                                    <!-- Výběr kategorie (Button) -->
                                    <button @click="open = !open" type="button"
                                            class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2 bg-white text-gray-700 flex justify-between items-center">
                                        <span x-text="selected || 'Vyberte kategorii'"></span>
                                        <svg class="h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 01.02-1.06z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div x-show="open" @click.away="open = false"
                                         class="absolute z-10 mt-2 w-full rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <!-- Vyhledávací pole -->
                                        <div class="p-2">
                                            <input type="text" x-model="query"
                                                   @input="filteredItems = items.filter(item => item.name.toLowerCase().includes(query.toLowerCase()))"
                                                   placeholder="Vyhledávejte kategorie..."
                                                   class="w-full rounded-md border-gray-300 shadow-sm px-4 py-2 text-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <!-- Filtrované položky -->
                                        <ul class="py-1 max-h-64 overflow-y-auto">
                                            <template x-for="item in filteredItems" :key="item.name">
                                                <li @click="selected = item.name; open = false"
                                                    class="flex items-center gap-2 cursor-pointer px-4 py-2 text-sm"
                                                    :class="item.isCategory ? `text-${item.color}-700 font-semibold hover:bg-${item.color}-50` : 'text-gray-700 hover:bg-gray-100'">
                                                    <template x-if="item.isCategory">
                                                    <span class="material-icons" :class="`text-${item.color}-500`"
                                                          x-text="item.icon"></span>
                                                    </template>
                                                    <span x-text="item.name"></span>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Účet -->
                            <div>
                                <label for="accountIncome"
                                       class="block text-sm font-medium text-gray-700">Účet</label>
                                <select id="accountIncome" name="accountIncome" required
                                        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                                    <option>ČSOB Premium</option>
                                    <option>Air Bank</option>
                                    <option>Spořicí účet</option>
                                </select>
                            </div>
                            <!-- Tlačítko Přidat transakci -->
                            <div class="flex items-center justify-center mt-5">
                                <button type="submit"
                                        class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-lg shadow-lg hover:scale-105 transition-transform flex items-center">
                                    <span class="material-icons text-white mr-2">add_circle</span>
                                    Vložit příjem
                                </button>
                            </div>
                        </div>
                        <!-- Spodní řada -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center mt-2">
                            <!-- Částka -->
                            <div>
                                <label for="amountIncome"
                                       class="block text-sm font-medium text-gray-700">Částka</label>
                                <input type="number" step="0.01" id="amountIncome" name="amountIncome" required
                                       class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2"
                                       placeholder="0.00">
                            </div>
                            <!-- Měna -->
                            <div>
                                <label for="currencyIncome"
                                       class="block text-sm font-medium text-gray-700">Měna</label>
                                <select id="currencyIncome" name="currencyIncome" required
                                        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                                    <option selected>Kč</option>
                                    <option>€</option>
                                    <option>$</option>
                                </select>
                            </div>

                            <!-- Poznámka -->
                            <div class="col-span-2">
                                <label for="noteIncome"
                                       class="block text-sm font-medium text-gray-700">Poznámka</label>
                                <textarea id="noteIncome" name="noteIncome" rows="2"
                                          class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2"
                                          placeholder="Zadejte poznámku..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="transaction-form hidden" id="form-invest">
                    <h2 class="text-lg font-bold">Přidat investici</h2>
                    <form> <!-- Formulář pro investice --> </form>
                </div>


            </div>
        </div>
        <!-- GRID S TRANSAKCEMI TRANSAKCE -->
        <main class="bg-white shadow-md w-full my-4 p-4 rounded-lg">
            <h2 class="text-xl font-bold mb-4">Přehled transakcí za posledních 7 dní</h2>
            <!-- PREPINACI ZALOZKY-->
            <div class="mb-6">
                <ul class="flex border-b">
                    <li class="mr-1">
                        <a href="#transaction-list-output" onclick="showTab('transaction-list-output')"
                           class="bg-blue-100 inline-block py-2 px-4 text-blue-500 font-semibold rounded-t-lg hover:bg-blue-200 ">Výdaje
                        </a>
                    </li>
                    <li class="mr-1">
                        <a href="#transaction-list-income" onclick="showTab('transaction-list-income')"
                           class="bg-blue-100 inline-block py-2 px-4 text-blue-500 font-semibold rounded-t-lg hover:bg-blue-200">Příjmy
                        </a>
                    </li>
                    <li class="mr-1">
                        <a href="#transaction-list-invest" onclick="showTab('transaction-list-invest')"
                           class="bg-blue-100 inline-block py-2 px-4 text-blue-500 font-semibold rounded-t-lg hover:bg-blue-200">Investice
                        </a>
                    </li>
                </ul>
            </div>
            <!-- ZALOZKA VYDAJE-->
            <div id="transaction-list-output" class="tab-content">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-200">
                        <!-- Ikony nemají mít řazení -->
                        <th class="border border-gray-300 px-4 py-2">
                        </th>
                        <!-- Ostatní sloupce mají šipky vedle textu -->
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Datum transakce
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Kategorie
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Částka
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Účet
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Poznámka
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Vložil
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Vloženo
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="hover:bg-blue-100">
                        <td class="border border-gray-300 py-2">
                            <div class="flex justify-center items-center">
                                <span class="material-icons text-blue-600 group-hover:text-blue-800">home</span>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">17.1.2025</td>
                        <td class="border border-gray-300 px-4 py-2">Bydlení</td>
                        <td class="border border-gray-300 px-4 py-2">14 500 Kč</td>
                        <td class="border border-gray-300 px-4 py-2">ČSOB premium</td>
                        <td class="border border-gray-300 px-4 py-2">Nájem</td>
                        <td class="border border-gray-300 px-4 py-2">Jan Zítko</td>
                        <td class="border border-gray-300 px-4 py-2">17.1.2025 13:29</td>
                    </tr>
                    <tr class="hover:bg-blue-100">
                        <td class="border border-gray-300 py-2">
                            <div class="flex justify-center items-center">
                                <span class="material-icons text-blue-600 group-hover:text-blue-800">restaurant</span>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">16.1.2025</td>
                        <td class="border border-gray-300 px-4 py-2">Jídlo</td>
                        <td class="border border-gray-300 px-4 py-2">1 000 Kč</td>
                        <td class="border border-gray-300 px-4 py-2">ČSOB premium</td>
                        <td class="border border-gray-300 px-4 py-2">Lidl</td>
                        <td class="border border-gray-300 px-4 py-2">Jan Zítko</td>
                        <td class="border border-gray-300 px-4 py-2">16.1.2025 18:19</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- ZALOZKA PRIJMY-->
            <div id="transaction-list-income" class="tab-content hidden">
                <table class="table-auto w-full border-collapse border-spacing-0 border border-gray-200">
                    <thead>
                    <tr class="bg-gray-200">
                        <!-- Ikony nemají mít řazení -->
                        <th class="border border-gray-300 px-4 py-2">
                        </th>
                        <!-- Ostatní sloupce mají šipky vedle textu -->
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Datum transakce
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Kategorie
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Částka
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Účet
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Poznámka
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Vložil
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Vloženo
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="hover:bg-blue-100">
                        <td class="border border-gray-300 py-2">
                            <div class="flex justify-center items-center">
                                <span class="material-icons text-blue-600 group-hover:text-blue-800">work</span>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">12.1.2025</td>
                        <td class="border border-gray-300 px-4 py-2">Mzda</td>
                        <td class="border border-gray-300 px-4 py-2">20 000 Kč</td>
                        <td class="border border-gray-300 px-4 py-2">ČSOB premium</td>
                        <td class="border border-gray-300 px-4 py-2"></td>
                        <td class="border border-gray-300 px-4 py-2">Jan Zítko</td>
                        <td class="border border-gray-300 px-4 py-2">16.1.2025 18:19</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- ZALOZKA INVESTICE-->
            <div id="transaction-list-invest" class="tab-content hidden">
                <table class="table-auto w-full border-collapse border-spacing-0 border border-gray-200">
                    <thead>
                    <tr class="bg-gray-200">
                        <!-- Ikony nemají mít řazení -->
                        <th class="border border-gray-300 px-4 py-2">
                        </th>
                        <!-- Ostatní sloupce mají šipky vedle textu -->
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Datum transakce
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Kategorie
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Částka
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Účet
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Poznámka
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Vložil
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                        <th class="border border-gray-300 px-4 py-2">
                            <div class="flex items-center">
                                Vloženo
                                <div class="ml-2 text-gray-500 text-xs flex flex-col">
                                    <span class="material-icons">arrow_drop_up</span>
                                    <span class="material-icons -mt-4">arrow_drop_down</span>
                                </div>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="hover:bg-blue-100">
                        <td class="border border-gray-300 py-2">
                            <div class="flex justify-center items-center">
                                <span class="material-icons text-blue-600 group-hover:text-blue-800">stacked_bar_chart</span>
                            </div>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">12.1.2025</td>
                        <td class="border border-gray-300 px-4 py-2">Akcie</td>
                        <td class="border border-gray-300 px-4 py-2">5 000 Kč</td>
                        <td class="border border-gray-300 px-4 py-2">Trading212</td>
                        <td class="border border-gray-300 px-4 py-2"></td>
                        <td class="border border-gray-300 px-4 py-2">Jan Zítko</td>
                        <td class="border border-gray-300 px-4 py-2">16.1.2025 18:19</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</x-layouts.app>
