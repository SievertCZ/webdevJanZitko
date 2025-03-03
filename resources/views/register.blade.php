<x-layouts.appGuest>

        <div class="max-w-md mx-auto bg-gray-100 p-6 rounded-lg shadow-md">


            <form action="/register" method="POST" >
                <!-- Jméno -->
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Jméno</label>
                    <input type="text" id="name" name="name" required placeholder="Vaše přezdívka" class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                    @error("name")
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Váš email" class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                    @error("email")
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Heslo -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Heslo</label>
                    <input type="password" id="password" name="password" required placeholder="Vaše heslo" class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">
                    @error("password")
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Potvrzení hesla -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Potvrzení hesla</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Potvrďte heslo" class="mt-1 block w-full rounded-md border border-gray-300 focus:border-blue-300 focus:ring-blue-300 focus:ring-1 focus:outline-none text-lg p-2">

                </div>
                <!-- Tlačítko Registrovat se -->
                <div class="flex items-center justify-center mt-5">
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-lg shadow-lg hover:scale-105 transition-transform flex items-center">
                        Registrovat se
                    </button>
                </div>
                <!-- Dodatečný odkaz pro přesměrování na přihlašovací stránku -->
                <div class="mt-4 text-center text-sm text-gray-600">
                    <a href="/login" class="hover:underline">Už máte účet? Přihlaste se</a>
                </div>
            </form>
        </div>

</x-layouts.appGuest>
