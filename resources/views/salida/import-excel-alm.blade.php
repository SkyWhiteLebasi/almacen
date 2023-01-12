{{-- @if (auth()->user()->rol == 'admin') --}}
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
                                <h3 class="card-title">Crear varias salidas validadas</h3>
                            </div>
                            <form action="{{ route('salida.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="foto"> Formato Excel </label>
                                    
                                    <input type="file" class="form-control" name="import_file_alm">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Importar</button>
                                    <a href="{{ url('salida') }}" class="btn btn-success"> Regresar </a>
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

