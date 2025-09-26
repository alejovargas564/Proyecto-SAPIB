<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Nueva Categoría Donación</h1>

            <form action="{{ route('categoriadonacion.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="nombre_categoria" class="block text-sm font-medium text-gray-700">Nombre de la Categoría</label>
                    <input type="text" name="nombre_categoria" id="nombre_categoria"
                           class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                           placeholder="Ej: Donaciones Médicas" required>
                </div>

                
                <div class="flex justify-center space-x-4">
                    
                    <button type="submit"
                            style="color: black; background-color: #10b948ff "
                            class="px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition">
                        Guardar 💾
                    </button>
                    <hr/>
                    
                    <a href="{{ route('categoriadonacion.index') }}"
                        style="color: black; background-color: #d60e0eff "
                       class="px-5 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 transition">
                        Cancelar ✖️
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>