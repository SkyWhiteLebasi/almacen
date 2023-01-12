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
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"> Crear una nueva categoria</h3>
                            </div>
                            <form action="{{ route('categoria.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="nombre_categoria"> Nombre de categoria</label>
                                    <input type="text" class="form-control" name="nombre_categoria"
                                        value="{{ isset($categoria->nombre_categoria) ? $categoria->nombre_categoria : old('nombre_categoria') }}"
                                        placeholder="nombre de la categoria" id="nombre_categoria">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">guardar</button>
                                    <a href="{{ url('categoria/') }}" class="btn btn-success"> Regresar </a>
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
