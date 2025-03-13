<!-- Formulář pro příjmy -->
    <form action="{{ route('income.store') }}" method="POST" class="..." novalidate onsubmit="return validateForm()">
        @csrf
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
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategorie</label>

            <select id="category_id" name="category_id" required
                    class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-blue-300
                   focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2 bg-white text-gray-700">
                <option value="" disabled selected>Vyberte kategorii</option>

                <!-- Hlavní kategorie -->
                @foreach($categoriesIncomeTransactions->where('parent_id', null) as $category)
                    <optgroup label="{{ $category->name }}">
                        @foreach($categoriesIncomeTransactions->where('parent_id', $category->id) as $subCategory)
                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>

        <!-- Účet -->
        <div>
            <label for="accountIncome"
                   class="block text-sm font-medium text-gray-700">Účet</label>
            <select id="accountIncome" name="accountIncome" required
                    class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                @foreach($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->bank_name }} ({{ $account->account_number }})</option>
                @endforeach
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
