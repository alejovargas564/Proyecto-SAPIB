<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorías Taller') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6 text-gray-800">Listado de Categorías Taller</h1>

                <a href="{{ route('categoriataller.create') }}"
                     style="background-color: #16a34a; color: white;"
                    class="inline-block px-6 py-2 font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                    ➕ Nueva Categoría
                </a>
                <hr/>

                @if(session('ok'))
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-700 border border-green-300">
                        {{ session('ok') }}
                    </div>
                @endif

                <table id="categorias" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Categoría</th>
                            <th>Nombre Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id_categoria_taller }}</td>
                                <td>{{ $categoria->nombre_categoria }}</td>
                                <td>
                                    <a href="{{ route('categoriataller.edit', $categoria->id_categoria_taller) }}"
                                       class="btn btn-sm btn-warning"
                                       style="background-color: #2a41c2ff; color: white;">
                                        Editar ✏️
                                    </a>
                                    
                                    <form action="{{ route('categoriataller.destroy', $categoria->id_categoria_taller) }}"
                                          method="POST"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                style="background-color: #a31616ff; color: white;"
                                                onclick="return confirm('¿Seguro que quieres eliminar esta categoría?')">
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
            $('#categorias').DataTable({
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