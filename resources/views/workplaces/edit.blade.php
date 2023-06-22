@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Actualizar Area de Trabajo</h1>
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
                        <form action="{{ route('workplaces.update', $workplaces) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre <b style="color: red">*</b></label>
                                <input type="text" name="name" class="form-control " id="name" class="form-control" value="{{$workplaces->name}}">
                                @error('name')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Manager</label>
                                <select name="manager_id" class="form-control" id="manager_id">
                                    <optgroup label="Seleccion actual">
                                        <option value="{{$workplaces->manager_id}}" selected>{{$workplaces->manager->name}}</option>
                                    </optgroup>
                                    <optgroup label="Departamentos Disponibles">
                                        @foreach ($managers as $manager)
                                            <option value="{{$manager->id}}" {{ old('manager_id') == $manager->id ? 'selected' : '' }}>
                                                {{$manager->name}}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('manager_id')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Actualizar</button>
                                </div>
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

