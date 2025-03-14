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
