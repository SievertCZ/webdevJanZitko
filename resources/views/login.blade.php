<x-layouts.appGuest>

    <div class="max-w-md mx-auto bg-gray-100 p-6 rounded-lg shadow-md">
        <form action="/login" method="POST">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required placeholder="Váš email" class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
            </div>
            <!-- Heslo -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Heslo</label>
                <input type="password" id="password" name="password" required placeholder="Vaše heslo" class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
            </div>
            <!-- Tlačítko Přihlásit se -->
            <div class="flex items-center justify-center mt-5">
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-lg shadow-lg hover:scale-105 transition-transform flex items-center">
                    Přihlásit se
                </button>
            </div>
            <!-- Dodatečné odkazy -->
            <div class="mt-4 text-center text-sm text-gray-600">
                <a href="/forgot-password" class="hover:underline">Zapomenuté heslo?</a>
                <span class="mx-2">|</span>
                <a href="/register" class="hover:underline">Registrovat</a>
            </div>
        </form>
    </div>


</x-layouts.appGuest>
