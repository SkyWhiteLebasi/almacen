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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Editar salida </h3>
                            </div>
                            <form action="{{ url('/salida/' . $salida->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label for="producto_id"> Nombre Producto</label>
                                    <select class="form-control" name='producto_id' id="producto_id">

                                        @foreach ($produc as $pro)
                                            <option value="{{ $pro->id }}"
                                                {{ old('producto_id', $salida->producto_id) == $pro->id ? 'selected' : '' }}>
                                                {{ $pro->nombre_pr }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @php($variable)

                                <div class="form-group">
                                    <label for="cant_salida"> Cantidad de salida</label>
                                    <input type="integer" class="form-control" name="cant_salida"
                                        value="{{ isset($salida->cant_salida_val) ? $salida->cant_salida_val : old('cant_salida') }}"
                                        placeholder="Escriba la cantidad de salida" id="cant_salida">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="cant_salida_val"
                                        value="{{ isset($salida->cant_salida_val) ? $salida->cant_salida_val : old('cant_salida_val') }}"
                                        placeholder="Escriba la cantidad de salida" id="cant_salida_val">
                                </div>

                                <div class="form-group">
                                    <label for="obs_salida">Observacion de la salida</label>
                                    <input type="text" class="form-control" name="obs_salida"
                                        value="{{ isset($salida->obs_salida) ? $salida->obs_salida : old('obs_salida') }}"
                                        placeholder="Observacion de la entrada" id="obs_salida">
                                </div>

                                <div class="form-group">
                                    <label for="fecha_salida"> Fecha de salida</label>
                                    <input type="date" class="form-control" name="fecha_salida"
                                        value="{{ isset($salida->fecha_salida) ? $salida->fecha_salida : old('fecha_salida') }}"
                                        placeholder="fecha_salida" id="fecha_salida">
                                </div>
                            
                                <div class="form-group">
                                    <label for="contador_salida"> VALIDACION</label>
                                    <select class="form-control" name='contador_salida' id="contador_salida">
                                        <option value=1>validado</option>

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>
                                    <a href="{{ url('salida/nutricion') }}" class="btn btn-success">
                                        Regresar </a>
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
