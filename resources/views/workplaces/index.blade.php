@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('content_header')
    <h1>Area de Trabajo</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <h3 class="card-title">
                                @can('workplaces.create')
                                    <a class="btn btn-success" href="{{ route('workplaces.create') }}"> Nuevo Area de Trabajo</a>
                                @endcan
                            </h3>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table id="workplaces" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Manager</th>
                                    <th>Telefono</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($workplaces as $workplace)
                                    <tr>
                                        <td>{{ $workplace->name }}</td>
                                        <td>{{ $workplace->manager->name }}</td>
                                        <td>{{ $workplace->manager->phone_number }}</td>
                                        <td>
                                            <div class="grupo-botones">
                                                @can('workplaces.edit')
                                                    <div class="boton-warning">
                                                        <a class="btn btn-primary"
                                                           href="{{ route('workplaces.edit', $workplace->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                    </div>
                                                @endcan
                                                @can('workplaces.destroy')
                                                    <form action="{{ route('workplaces.destroy', $workplace) }}"
                                                          class="delete-usuario" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Manager</th>
                                    <th>Telefono</th>
                                    <th>Acciones</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop

@section('js')
@if (session('update') == 'ok')
<script>
    Swal.fire({
        type: 'success',
        title: 'Registro actualizado',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
@if (session('create') == 'ok')
<script>
    Swal.fire({
        type: 'success',
        title: 'Registro Creado',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

@if (session('delete') == 'ok')
<script>
    Swal.fire({
        type: 'success',
        title: 'Registro Eliminado',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

    <script>
        $(document).ready(function() {
            $('#workplaces').DataTable({
                "order": [
                    [0, "dec"]
                ],
                "language": {
                    "search": "Buscar:",
                    "info": "_TOTAL_ registros",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                    },
                    "lengthMenu": 'Mostrar <select>' +
                        '<option value ="10">10</option>' +
                        '<option value ="30">30</option>' +
                        '<option value ="-1">Todos</option>' +
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "zeroRecords": "No hay registros",
                }
            });
        });
    </script>
@endsection
