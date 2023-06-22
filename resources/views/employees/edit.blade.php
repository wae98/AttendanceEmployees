@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Actualizar Empleado</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employees.update', $employees) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre <b style="color: red">*</b></label>
                                <input type="text" name="name" class="form-control " id="name" class="form-control" value="{{$employees->name}}">
                                @error('name')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="surname">Apellido <b style="color: red">*</b></label>
                                <input type="text" name="surname" class="form-control " id="surname" class="form-control" value="{{$employees->surname}}">
                                @error('surname')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="birthdate">Fecha de Nacimiento <b style="color: red">*</b></label>
                                <input type="date" name="birthdate" class="form-control " id="birthdate" class="form-control" value="{{$employees->birthdate}}">
                                @error('birthdate')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Departamentos</label>
                                <select name="department_id" class="form-control" id="department_id">
                                    <optgroup label="Seleccion actual">
                                        <option value="{{$employees->department_id}}" selected>{{$employees->department->name}}</option>
                                    </optgroup>
                                    <optgroup label="Departamentos Disponibles">
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                {{$department->name}}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('department_id')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Areas de Trabajo</label>
                                <select name="workplace_id" class="form-control" id="workplace_id">
                                    <optgroup label="Seleccion actual">
                                        <option value="{{$employees->workplace_id}}" selected>{{$employees->workplace->name}}</option>
                                    </optgroup>
                                    <optgroup label="Areas de Trabajo Disponibles">
                                        @foreach ($workplaces as $workplace)
                                            <option value="{{$workplace->id}}" {{ old('workplace_id') == $workplace->id ? 'selected' : '' }}>
                                                {{$workplace->name}}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('workplace_id')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Actualizar Usuario</button>
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

