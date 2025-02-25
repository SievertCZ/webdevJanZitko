<x-layouts.appGuest>

        <div class="max-w-md mx-auto bg-gray-100 p-6 rounded-lg shadow-md">
            <form novalidate onsubmit="return false">
                <!-- Nadpis stránky (volitelné) -->
                <h2 class="text-xl font-semibold mb-4 text-center">Získat odkaz pro obnovu hesla</h2>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        placeholder="Váš email"
                        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2"
                    >
                </div>

                <!-- Tlačítko Odeslat -->
                <div class="flex items-center justify-center mt-5">
                    <button
                        type="submit"
                        class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-lg shadow-lg hover:scale-105 transition-transform flex items-center"
                    >
                        Odeslat odkaz
                    </button>
                </div>

                <!-- Odkaz zpět na přihlášení -->
                <div class="mt-4 text-center text-sm text-gray-600">
                    <a href="{{ route('login') }}" class="hover:underline">
                        Zpět na přihlášení
                    </a>
                </div>
            </form>
        </div>

</x-layouts.appGuest>
