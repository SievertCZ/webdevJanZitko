<table class="table-auto w-full border-collapse border-spacing-0 border border-gray-200">
    <thead>
    <tr class="bg-gray-200">
        <th class="border border-gray-300 px-4 py-2"></th>
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
    @forelse($incomeTransactions as $transaction)
        <tr class="hover:bg-blue-100">
            <td class="border border-gray-300 py-2">
                <div class="flex justify-center items-center">
                    <span class="material-icons text-blue-600 group-hover:text-blue-800">
                        {{ $transaction->icon ?? 'work' }}
                    </span>
                </div>
            </td>
            <td class="border border-gray-300 px-4 py-2">
                {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d.m.Y') }}
            </td>
            <td class="border border-gray-300 px-4 py-2">
                {{ $transaction->category->name ?? 'Bez kategorie' }}
            </td>
            <td class="border border-gray-300 px-4 py-2">
                {{ number_format($transaction->amount, 2, ',', ' ') }} Kč
            </td>
            <td class="border border-gray-300 px-4 py-2">
                {{ $transaction->account->bank_name ?? 'Neznámý účet' }}
            </td>
            <td class="border border-gray-300 px-4 py-2">
                {{ $transaction->note ?? '-' }}
            </td>
            <td class="border border-gray-300 px-4 py-2">
                {{ $transaction->inserted_by }}
            </td>
            <td class="border border-gray-300 px-4 py-2">
                {{ \Carbon\Carbon::parse($transaction->inserted_at)->format('d.m.Y H:i') }}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="border border-gray-300 px-4 py-2 text-center">
                Žádné příjmy k zobrazení.
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

