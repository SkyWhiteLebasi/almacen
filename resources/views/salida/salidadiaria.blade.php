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
                                <h3 class="card-title">Crear una nueva salida</h3>
                            </div>
                            <form action="{{ route('salida.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="producto_id"> Nombre Producto y su Stock</label>
                                    <select class="form-control" name='producto_id' id="producto_id">
                                        @foreach ($produc as $pro)
                                            <option value="{{ $pro->id }}">{{ $pro->nombre_pr }} || {{ $pro->stock }}
                                            </option>
                                            @php($num = $pro->stock)
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="cant_salida"> Cantidad de salida</label>
                                    <input type="integer" class="form-control" name="cant_salida"
                                        value="{{ isset($salida->cant_salida) ? $salida->cant_salida : old('cant_salida') }}"
                                        placeholder="Escriba la cantidad de salida" id="cant_salida">
                                </div>

                                <div class="form-group">
                                    <label for="obs_salida">Observacion de la salida</label>
                                    <input type="text" class="form-control" name="obs_salida"
                                        value="{{ isset($salida->obs_salida) ? $salida->obs_salida : old('obs_salida') }}"
                                        placeholder="Observacion de la salida" id="obs_salida">
                                </div>

                                <div class="form-group">
                                    <label for="fecha_salida"> Fecha de salida</label>
                                    <input type="date" class="form-control" name="fecha_salida"
                                        value="{{ isset($salida->fecha_salida) ? $salida->fecha_salida : old('fecha_salida') }}"
                                        placeholder="fecha_salida" id="fecha_salida">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="contador_salida"> contador de salida</label>
                                    <input type="integer" class="form-control" name="contador_salida"
                                        value="{{ isset($salida->contador_salida) ? $salida->contador_salida : old('contador_salida') }}"
                                        placeholder="contador_salida" id="contador_salida">
                                </div> --}}
                                <div class="form-group">
                                    <label for="contador_salida"> Validación de Salida</label>
                                    <select class="form-control" name='contador_salida' id="contador_salida">
                                      
                                            <option value=0>validar</option>

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">guardar</button>
                                    <a href="{{ url('salida/') }}" class="btn btn-success"> Regresar </a>
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
