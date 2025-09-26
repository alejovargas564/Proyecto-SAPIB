<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-800">Listado de Donaciones</h1>

                {{-- Botón crear nueva donación --}}
                <a href="{{ route('donacion.create') }}"
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
                            <th>ID Donación</th>
                            <th>Categoría Donación</th>
                            <th>ID Método Donación</th>
                            <th>Nombre Método Donación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donacion as $d)
                            <tr>
                                <td>{{ $d->id_donacion }}</td>
                                <td>{{ $d->categoria_donacion->nombre_categoria ?? 'Sin categoría' }}</td>
                                <td>{{ $d->metodo_donacion->id_metodo_donacion ?? '-' }}</td>
                                <td>{{ $d->metodo_donacion->nombre_metodo_donacion ?? 'Sin método' }}</td>
                                <td>
                                    <a href="{{ route('donacion.edit', $d->id_donacion) }}"
                                       class="btn btn-sm btn-warning"
                                       style="background-color: #2a41c2ff; color: white;">
                                       Editar ✏️
                                    </a>

                                    <form action="{{ route('donacion.destroy', $d->id_donacion) }}"
                                          method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            style="background-color: #a31616ff; color: white;"
                                            onclick="return confirm('¿Seguro que deseas eliminar esta donación?')">
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