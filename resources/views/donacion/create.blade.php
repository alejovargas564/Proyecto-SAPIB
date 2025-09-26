<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Nueva Donación</h1>

            <form action="{{ route('donacion.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Selección de Categoría -->
                <div>
                    <label for="categoria_donacion_id_categoria_donacion" class="block text-sm font-medium text-gray-700">
                        Categoría de Donación
                    </label>
                    <select name="categoria_donacion_id_categoria_donacion" id="categoria_donacion_id_categoria_donacion"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id_categoria_donacion }}">
                                {{ $categoria->nombre_categoria }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria_donacion_id_categoria_donacion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Selección de Método -->
                <div>
                    <label for="metodo_donacion_id_metodo_donacion" class="block text-sm font-medium text-gray-700">
                        Método de Donación
                    </label>
                    <select name="metodo_donacion_id_metodo_donacion" id="metodo_donacion_id_metodo_donacion"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>
                        <option value="">Seleccione un método</option>
                        @foreach($metodos as $metodo)
                            <option value="{{ $metodo->id_metodo_donacion }}">
                                {{ $metodo->nombre_metodo_donacion }}
                            </option>
                        @endforeach
                    </select>
                    @error('metodo_donacion_id_metodo_donacion')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botones centrados -->
                <div class="flex justify-center space-x-4">
                    <!-- Botón Guardar -->
                    <button type="submit"
                            style="color: black; background-color: #10b948ff;"
                            class="px-5 py-2 text-white font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                        Guardar 💾
                    </button>

                    <!-- Botón Cancelar -->
                    <a href="{{ route('donacion.index') }}"
                       style="color: black; background-color: #d60e0eff;"
                       class="px-5 py-2 text-white font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                        Cancelar ✖️
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>