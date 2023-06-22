@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Nuevo Area de Trabajo</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('workplaces.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('workplaces.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre <b style="color: red">*</b></label>
                                <input type="text" name="name" class="form-control " id="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label> Managers</label>
                                <select name="manager_id" class="form-control" id="manager_id">
                                    <option value="">Seleccione un Manager</option>
                                    @foreach ($managers as $manager)
                                        <option value="{{$manager->id}}" {{ old('manager_id') == $manager->id ? 'selected' : '' }}>
                                            {{$manager->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('manager_id')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-dark">Crear Manager</button>
                        </form>
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

