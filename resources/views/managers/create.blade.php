@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Nuevo Manager</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('managers.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('managers.store') }}"  method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre <b style="color: red">*</b></label>
                                <input type="text" name="name" class="form-control " id="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="surname">Apellido <b style="color: red">*</b></label>
                                <input type="text" name="surname" class="form-control " id="surname" class="form-control" value="{{ old('surname') }}">
                                @error('surname')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Telefono <b style="color: red">*</b></label>
                                <input type="text" name="phone_number" class="form-control " id="phone_number" class="form-control" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Crear</button>
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

