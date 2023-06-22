@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Actualizar Manager</h1>
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
                        <form action="{{ route('managers.update', $managers) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nombre <b style="color: red">*</b></label>
                                    <input type="text" name="name" class="form-control " id="name" class="form-control" value="{{ $managers->name}}">
                                    @error('name')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="surname">Apellido <b style="color: red">*</b></label>
                                    <input type="text" name="surname" class="form-control " id="surname" class="form-control" value="{{ $managers->surname}}">
                                    @error('surname')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone_number">Telefono <b style="color: red">*</b></label>
                                    <input type="text" name="phone_number" class="form-control " id="phone_number" class="form-control" value="{{ $managers->phone_number}}">
                                    @error('phone_number')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>


                                <br>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Actualizar</button>
                                </div>
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

