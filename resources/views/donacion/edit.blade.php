<x-app-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Editar Donación</h1>

            <form action="{{ route('donacion.update', $donacion->id_donacion) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

               
                <div>
                    <label for="categoria_donacion_id_categoria_donacion" class="block text-sm font-medium text-gray-700">
                        Categoría de Donación
                    </label>
                    <select name="categoria_donacion_id_categoria_donacion" id="categoria_donacion_id_categoria_donacion"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id_categoria_donacion }}"
                                {{ $donacion->categoria_donacion_id_categoria_donacion == $categoria->id_categoria_donacion ? 'selected' : '' }}>
                                {{ $categoria->nombre_categoria }}
                            </option>
                        @endforeach
                    </select>
                </div>

                
                <div>
                    <label for="metodo_donacion_id_metodo_donacion" class="block text-sm font-medium text-gray-700">
                        Método de Donación
                    </label>
                    <select name="metodo_donacion_id_metodo_donacion" id="metodo_donacion_id_metodo_donacion"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                            required>
                        @foreach($metodos as $metodo)
                            <option value="{{ $metodo->id_metodo_donacion }}"
                                {{ $donacion->metodo_donacion_id_metodo_donacion == $metodo->id_metodo_donacion ? 'selected' : '' }}>
                                {{ $metodo->nombre_metodo_donacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                
                <div class="flex justify-center space-x-4">
                    
                    <button type="submit"
                            style="color: black; background-color: #2a41c2ff;"
                            class="px-5 py-2 font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                        Actualizar ✅
                    </button>

                    
                    <a href="{{ route('donacion.index') }}"
                       style="color: black; background-color: #d60e0eff;"
                       class="px-5 py-2 font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                        Cancelar ✖️
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>