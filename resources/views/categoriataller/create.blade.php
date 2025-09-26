<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Nueva Categoría Taller</h1>

            <form action="{{ route('categoriataller.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="nombre_categoria" class="block text-sm font-medium text-gray-700">Nombre de la Categoría</label>
                    <input type="text" id="nombre_categoria" name="nombre_categoria"
                           value="{{ old('nombre_categoria') }}"
                           placeholder="Ej: Taller de Arte"
                           class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>
                    @error('nombre_categoria')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botones centrados -->
                <div class="flex justify-center space-x-4">
                    <!-- Guardar -->
                    <button type="submit"
                            style="color: black; background-color: #10b948ff"
                            class="px-5 py-2 font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                        Guardar 💾
                    </button>

                    <!-- Cancelar -->
                    <a href="{{ route('categoriataller.index') }}"
                       style="color: black; background-color: #d60e0eff"
                       class="px-5 py-2 font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                        Cancelar ✖️
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>