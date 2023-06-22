@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Actualizar Status</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('statuses.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('statuses.update', $statuses) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nombre <b style="color: red">*</b></label>
                                    <input type="text" name="name" class="form-control " id="name" class="form-control" value="{{ $statuses->name}}">
                                    @error('name')
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

