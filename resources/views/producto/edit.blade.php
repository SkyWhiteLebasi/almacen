@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    @if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach ( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>


@endif

    <form action="{{url('/producto/'.$producto->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    <div class="form-group">
        <label for="nombre"> Nombre Producto</label>
        <input type="text" class="form-control" name="nombre_pr" value=" {{ isset($producto->nombre_pr)?$producto->nombre_pr:old('nombre_pr') }} " id="nombre_pr">
        </div>
        <!--
        <div class="form-group">
        <label for="apellido_p"> Unidad de Medida </label>
        <input type="text" class="form-control" name="medida_id" value="{{ isset($producto->medida_id)?$producto->medida_id:old('medida_id') }}" id="medida_id">
        </div>
        
        <div class="form-group">
            <label for="apellido_p"> categoria </label>
            <input type="text" class="form-control" name="categoria_id" value="{{ isset($producto->categoria_id)?$producto->categoria_id:old('categoria_id') }}" id="categoria_id">
        </div>-->
        
        <div class="form-group">
        <label for="stock"> Stock</label>
        <input type="text" class="form-control" name="stock" value="{{isset($producto->stock)?$producto->stock:old('stock') }}" id="stock">
        </div>
        
        <div class="form-group">
        <label for="desc_pr"> Descripcion </label>
        <input type="text" class="form-control"name="desc_pr" value="{{ isset($producto->desc_pr)?$producto->desc_pr:old('desc_pr') }}" id="desc_pr">
        
        </div>
        <div class="form-group">
        <label for="foto"> Foto </label>
        @if(isset($producto->foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->foto}}" width="100px" alt="">
        @endif
        <input type="file" class="form-control" name="foto" value="" id="foto">
        </div>
        <br>
        <br>
        <input type="submit" class="btn btn-primary" value="datos">
        <a href="{{ url('producto/')}}" class="btn btn-success"> Regresar </a>
        </div>
    </form>
</div>
@endsection