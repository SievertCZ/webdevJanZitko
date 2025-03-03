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
                    <!-- Formulář pro výdaje -->
                    @include('components.form.form_output')
                </div>

                <div class="transaction-form hidden" id="form-income">
                    <!-- Formulář pro příjmy -->
                    @include('components.form.form_input', ['accounts' => $accounts])
                </div>

                <div class="transaction-form hidden" id="form-invest">
                    <!-- Formulář pro investice -->
                    @include('components.form.form_invest')
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
                @include('components.grid.grid_output')
            </div>
            <!-- ZALOZKA PRIJMY-->
            <div id="transaction-list-income" class="tab-content hidden">
                @include('components.grid.grid_input')
            </div>
            <!-- ZALOZKA INVESTICE-->
            <div id="transaction-list-invest" class="tab-content hidden">
                @include('components.grid.grid_invest')
            </div>
        </main>
    </div>

</x-layouts.app>
