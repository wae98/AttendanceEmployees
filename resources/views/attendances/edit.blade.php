@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Actualizar Asistencia</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('attendances.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('attendances.update', $attendances) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="date">Fecha <b style="color: red">*</b></label>
                                <input type="date" name="date" class="form-control " id="date" class="form-control" value="{{$attendances->date}}">
                                @error('date')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Empleado</label>
                                <select name="employee_id" class="form-control" id="employee_id">
                                    <optgroup label="Seleccion actual">
                                        <option value="{{$attendances->employee_id}}" selected>{{$attendances->employee->name}}</option>
                                    </optgroup>
                                    <optgroup label="Empleados">
                                        @foreach ($employees as $employee)
                                            <option value="{{$employee->id}}" {{ old('employe_id') == $employee->id ? 'selected' : '' }}>
                                                {{$employee->name . " " . $employee->surname}}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('manager_id')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_id" class="form-control" id="status_id">
                                    <optgroup label="Seleccion actual">
                                        <option value="{{$attendances->status_id}}" selected>{{$attendances->status->name}}</option>
                                    </optgroup>
                                    <optgroup label="Empleados">
                                        @foreach ($statuses as $status)
                                            <option value="{{$status->id}}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                                {{$status->name}}
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

