@extends('backend.layouts.app')

@section('content')

    <div class="content-wrapper">
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Crear una nueva semana</h3>
                            </div>
                            <form action="{{ route('semana.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="nombre"> Nombre de Semana</label>
                                    <input type="text" class="form-control" name="nombre_semana"
                                        value="{{ isset($semana->nombre_semana) ? $semana->nombre_semana : old('nombre_semana') }}"
                                        placeholder="nombre del producto" id="nombre_pr">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">guardar</button>
                                    <a href="{{ url('semana/') }}" class="btn btn-success"> Regresar </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
