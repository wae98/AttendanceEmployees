@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Nuevo Departamento</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('departments.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('departments.store') }}"  method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="code">Codigo <b style="color: red">*</b></label>
                                <input type="text" name="code" class="form-control " id="code" class="form-control" value="{{ old('code') }}">
                                @error('code')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nombre <b style="color: red">*</b></label>
                                <input type="text" name="name" class="form-control " id="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                <small style="color:red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Descripcion <b style="color: red">*</b></label>
                                <input type="text" name="description" class="form-control " id="description" class="form-control" value="{{ old('description') }}">
                                @error('description')
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

