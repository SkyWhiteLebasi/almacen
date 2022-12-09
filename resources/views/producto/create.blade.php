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

    <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="nombre"> Nombre Producto</label>
            <input type="text" class="form-control" name="nombre_pr" value="{{ isset($producto->nombre_pr)?$producto->nombre_pr:old('nombre_pr') }}" placeholder="nombre del producto" id="nombre_pr">
            </div>
        
            <div class="form-group">
                <label for="exampleFormControlSelect1">Categoria</label>
                <select class="form-control" name='categoria_id' id="exampleFormControlSelect1">
                  @foreach ($categ as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre_categoria }} </option>
                  @endforeach
                </select>
              </div>
            
            <!--<div class="form-group">
                <label for="categoria_id"> categoria </label>
                <input type="text" class="form-control" name="categoria_id"  id="categoria_id">
            </div>-->
            
            <div class="form-group">
            <label for="apellido_m"> Stock</label>
            <input type="text" class="form-control" name="stock" value="{{isset($producto->stock)?$producto->stock:old('stock') }}" placeholder="stock" id="stock">
            </div>
            
            <div class="form-group">
            <label for="correo"> Descripcion </label>
            <input type="text" class="form-control"name="desc_pr" value="{{ isset($producto->desc_pr)?$producto->desc_pr:old('desc_pr') }}" placeholder="descripcion del producto" id="desc_pr">
            
            </div>
            <div class="form-group">
            <label for="foto"> Foto </label>
            @if(isset($producto->foto))
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->foto}}" width="100px" alt="">
            @endif
            <input type="file" class="form-control" name="foto" value="" id="foto">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">guardar</button>
                <a href="{{ url('producto/')}}" class="btn btn-success"> Regresar </a>
        </div>
         
    </form>
</div>
@endsection