@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    


    <form action="{{url('/producto/'.$producto->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @php($variable='125')
    <div class="form-group">
        <label for="nombre"> Nombre Producto</label>
        <input type="text" class="form-control" name="nombre_pr" value=" {{ $producto->nombre_pr}} " id="nombre_pr">
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
            <label for="stock"> Agregar Stock</label>
            <input type="text" class="form-control" name="stock" value="{{$variable}}" id="stock">
            </div>
        <div class="form-group">
            <label for="stock"> Stock</label>
            <input type="text" class="form-control" name="stock" value="{{$producto->stock+$variable}}" id="stock">
        </div>
        <div class="form-group">
        <label for="desc_pr"> Descripcion </label>
        <input type="text" class="form-control"name="desc_pr" value="{{ $producto->desc_pr}}" id="desc_pr">
        
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
        <input type="submit" class="btn btn-primary" value="agregar">
        <a href="{{ url('producto/')}}" class="btn btn-success"> Regresar </a>
        </div>
    </form>
</div>
@endsection