<x-app-layout>
    <h2 class="text-xl font-bold">Nueva Donación</h2>

    <form action="{{ route('usuariohasdonacion.store') }}" method="POST">
        @csrf
        <<label>Usuario</label>
<select name="usuario_id_usuario" class="border p-2 w-full">
    @foreach(\App\Models\User::all() as $user)
        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
    @endforeach
</select>

        <label>ID Donación</label>
        <input type="number" name="donacion_id_donacion" class="border p-2 w-full">

        <label>Fecha Donación</label>
        <input type="date" name="fecha_donacion" class="border p-2 w-full">

        <label>Estado</label>
        <select name="estado_donacion" class="border p-2 w-full">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>

        <label>Descripción</label>
        <input type="text" name="descripcion_donacion" class="border p-2 w-full">

        <label>Cantidad</label>
        <input type="text" name="cantidad_donacion" class="border p-2 w-full">

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-3">Guardar</button>
    </form>
</x-app-layout>