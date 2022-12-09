@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">


    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('mensaje')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
    @endif
    





<a href="{{ url('producto/create')}}" type="button" class="btn btn-primary"> Registrar producto</a>

<br>
<br>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Nombre Producto</th>
            <th>Unidad Medida</th>
            <th>Categoria</th>
            <th>Stock</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            
               
           
            <td> {{$producto->id}} </td>
            <!--<td> {{$producto->foto}} </td>--->
            <td> <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->foto}}" width="100px" alt=""></td>
            
            <td> {{$producto->nombre_pr}} </td>
            <td> {{$producto->medida_id}} </td>
            <td> {{$producto->categoria->id}} </td>
            <td> {{$producto->stock}} </td>
            <td> {{$producto->desc_pr}} </td>
            <td> 
                <a href="{{ url('/producto/'.$producto->id.'/edit'),  }}" class="btn btn-warning">editar</a>
                 |
                <form action="{{ url('/producto/'.$producto->id) }}" class="d-inline" method ="POST">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" class="btn btn-danger" onclick ="return confirm('¿quieres borrar we?')" value="borrar">
                </form>
                
                <a href="{{ route('producto.show', $producto->id) }}" class="btn btn-primary">Ver</a>
            </td>
          
        </tr>
        @endforeach
    </tbody>
</table>
{{-- {!! $productos->links()!!} <!--en controlador de empleado, en la función index se tiene el paginate y este se realciona con links --> --}}
</div>
@endsection