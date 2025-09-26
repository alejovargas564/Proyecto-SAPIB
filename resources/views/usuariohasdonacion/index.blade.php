<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donaciones por Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <h1 class="text-2xl font-bold mb-6 text-gray-800">Listado de Donaciones de Usuarios</h1>

                <a href="{{ route('usuariohasdonacion.create') }}"
                   style="background-color: #16a34a; color: white;"
                   class="inline-block px-6 py-2 font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                   ➕ Nueva Donación
                </a>

                <hr/>

                {{-- Mensaje de éxito --}}
                @if(session('success'))
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-700 border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                <table id="donaciones" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Registro</th>
                            <th>Usuario</th>
                            <th>Donación</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuariohasdonacion as $u)
                            <tr>
                                <td>{{ $u->usuario_por_donacion }}</td>
                                
                                {{-- Mostrar nombre del usuario --}}
                                <td>{{ $u->user ? $u->user->name : '---' }}</td>

                                {{-- Mostrar el nombre de la donación si existe relación --}}
                                <td>{{ $u->donacion ? $u->donacion->nombre_donacion : $u->donacion_id_donacion }}</td>
                                
                                <td>{{ $u->fecha_donacion ? $u->fecha_donacion->format('d/m/Y') : '---' }}</td>
                                <td>
                                    <span class="px-2 py-1 rounded text-white text-sm font-semibold"
                                          style="background-color: {{ $u->estado_donacion ? '#16a34a' : '#a31616' }};">
                                        {{ $u->estado_donacion ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td>{{ $u->descripcion_donacion ?? '---' }}</td>
                                <td>{{ $u->cantidad_donacion ?? '---' }}</td>
                                
                                <td>
                                    <a href="{{ route('usuariohasdonacion.edit', $u->usuario_por_donacion) }}"
                                       class="rounded px-4 py-1 text-white shadow-md hover:opacity-90 transition"
                                       style="background-color: #2a41c2ff;">
                                       Editar ✏️
                                    </a>

                                    <form action="{{ route('usuariohasdonacion.destroy', $u->usuario_por_donacion) }}"
                                          method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="rounded px-3 py-1 text-white shadow-md hover:opacity-90 transition"
                                            style="background-color: #a31616ff;"
                                            onclick="return confirm('¿Seguro que deseas eliminar este registro?')">
                                            Eliminar 🗑️
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- jQuery + DataTables + Botones --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(function() {
            $('#donaciones').DataTable({
                pageLength: 20,
                dom: 'Bfrtip',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
</x-app-layout>