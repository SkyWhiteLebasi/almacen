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
    
<br>

{{-- <select class="form-control" name='producto_id' id="producto_id">
    @foreach ($semana as $sema)
      <option value="{{ $sema->semana_id }}">{{ $sema->nombre_semana }}</option>
    @endforeach
 </select> --}}
 <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            @can('pedido.create')
                            <a href="{{ url('pedido/create')}}" type="button" class="btn btn-pastel1">  <i class="fas fa-folder-plus"></i> Añadir pedido</a>
                            @endcan
                            @can('pedido.import-excel')
                            <a href="{{ url('pedido/import-excel')}}" type="button" class="btn btn-pastel2"> <i class="fas fa-file-excel"></i> Importar</a>
                            @endcan
                            @can('pedido.pdf')
                            <a href="{{ url('pedido/pdf')}}" type="button" class="btn btn-pastel3"><i class="fas fa-file-pdf"></i> Pdf</a>
                            @endcan
                        </h3>
                    </div>
                        <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Unidad de Medida</th>
                                    <th>Producto</th>
                                    <th>Semana</th>
                                    <th>Primera entrega</th>
                                    <th>Segunda entrega</th>
                                    <th>Cantidad Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($pedidos as $pedido)
                                {{-- @if ($pedido->semana_id== $sema->semana_id){ --}}
                                <tr>
                                    
                                    <td> {{$pedido->id}} </td>
                                    <td> {{$pedido->medida->nombre_medida}}</td>
                                    
                                    {{-- <td> {{$pedido->medida->id}}</td> --}}
                                    <td> {{$pedido->producto->nombre_pr}}</td>
                                    <td> {{$pedido->semana->nombre_semana}}</td>
                                    <td> {{$pedido->primera_entrega}} </td>
                                    <td> {{$pedido->segunda_entrega}} </td>
                                    {{-- <td> {{$producto->$categoria->id}} </td> --}}
                                    
                                    <td> {{$pedido->total_entrega}} </td>
                                    <td> 
                                        @can('pedido.edit')
                                        <a href="{{ url('/pedido/'.$pedido->id.'/edit'),  }}" class="btn btn-pastel1"><i class="fas fa-pencil-alt"></i> Editar</a>
                                        @endcan
                                        @can('pedido.destroy')
                                        <form action="{{ url('/pedido/'.$pedido->id) }}" id="form-eliminar" class="d-inline" method ="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-pastel4"><i class="fas fa-trash-alt"></i> Borrar</button>	
                                        </form>
                                        @endcan
                                    
                                    </td>
                                
                                </tr>
                                
                            {{-- @endif   --}}
                                @endforeach
                            
                                        
                        
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            {!! $pedidos->links()!!}
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
</div>
@endsection
@section('js')
    @if (session('guardar') == 'ok')
    <script>
        Swal.fire({
        // position: 'top-end',
        icon: 'success',
        title: 'Pedido creado exitosamente',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
    @endif
    @if (session('editar') == 'ok')
    <script>
        Swal.fire({
        // position: 'top-end',
        icon: 'success',
        title: 'Pedido modificado exitosamente',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
    @endif
    @if (session('eliminar') == 'ok')
    <script>
        Swal.fire(
            'Eliminado!',
            'Se ha eliminado exitosamente',
            'success'
            )
    </script>
    @endif
        


    <script type="text/javascript">
        $('#form-eliminar').submit(function(e) {

            e.preventDefault();

            
            Swal.fire({
                title: '¿Está seguro?',
                text: "No será capaz de revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                   
                    this.submit();
                }
            })
        });
    </script>
@endsection