<x-app-layout>
    <h2 class="text-xl font-bold">Editar Donación</h2>

    <form action="{{ route('usuariohasdonacion.update', $donacion->usuario_por_donacion) }}" method="POST">
        @csrf
        @method('PUT')

        <label>ID Usuario</label>
        <input type="number" name="usuario_id_usuario" value="{{ $donacion->usuario_id_usuario }}" class="border p-2 w-full">

        <label>ID Donación</label>
        <input type="number" name="donacion_id_donacion" value="{{ $donacion->donacion_id_donacion }}" class="border p-2 w-full">

        <label>Fecha Donación</label>
        <input type="date" name="fecha_donacion" value="{{ $donacion->fecha_donacion }}" class="border p-2 w-full">

        <label>Estado</label>
        <select name="estado_donacion" class="border p-2 w-full">
            <option value="1" @if($donacion->estado_donacion) selected @endif>Activo</option>
            <option value="0" @if(!$donacion->estado_donacion) selected @endif>Inactivo</option>
        </select>

        <label>Descripción</label>
        <input type="text" name="descripcion_donacion" value="{{ $donacion->descripcion_donacion }}" class="border p-2 w-full">

        <label>Cantidad</label>
        <input type="text" name="cantidad_donacion" value="{{ $donacion->cantidad_donacion }}" class="border p-2 w-full">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-3">Actualizar</button>
    </form>
</x-app-layout>