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

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <br><br>
       
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <h3 class="card-title">
                                    @can('producto.create')
                                        <a href="{{ url('producto/create')}}" type="button" class="btn btn-pastel1">  <i class="fas fa-folder-plus"></i> Crear producto</a>
                                    @endcan
                                    @can('producto.import-excel')
                                        <a href="{{ url('producto/import-excel')}}" type="button" class="btn btn-pastel2"> <i class="fas fa-file-excel"></i> Importar</a>
                                    @endcan
                                    @can('producto.pdf')
                                        <a href="{{ url('producto/pdf')}}" type="button" class="btn btn-pastel3"><i class="fas fa-file-pdf"></i> Pdf</a>   
                                    @endcan
                                   </h3>
                            </div>
                            <div class="col-8">
                                <form method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Ingrese texto a buscar">
                                    <div class="input-group-append">
                                        <button class="btn btn-pastel5" type="submit"><i class="fas fa-search"></i> Buscar</button>	
                                    </div>
                                </div>      
                                </form>
                            </div>
                        </div>
                    <br>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Foto</th>
                                    <th>Numero de orden</th>
                                    <th>Nombre Producto</th>
                                    <th>Unidad Medida</th>
                                    <th>Categoria</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($productos->isNotEmpty())
                                @foreach ($productos as $producto)
                                <tr>
                                    
                                    
                                
                                    <td> {{$num++}} </td>
                                    
                                    <!--<td> {{$producto->foto}} </td>--->
                                    <td> <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->foto}}" width="100px" alt=""></td>
                                    <td> {{$producto->num_orden}} </td>
                                    <td> {{$producto->nombre_pr}} </td>
                                    <td> {{$producto->medida->nombre_medida}} </td>
                                    <td> {{$producto->categoria->nombre_categoria}} </td>
                                    <td> {{$producto->stock}} </td>
                                    <td> 
                                        @can('producto.create')
                                        <a href="{{ url('/producto/'.$producto->id.'/edit'),  }}" class="btn btn-pastel1"><i class="fas fa-pencil-alt"></i> Editar</a>	
                                        @endcan
                                        @can('producto.destroy')
                                        <form action="{{ url('/producto/'.$producto->id) }}" id="form-eliminar" class="d-inline" method ="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-pastel4"><i class="fas fa-trash-alt"></i> Borrar</button>	
                                        </form>
                                        @endcan
                                    </td>
                                    {{-- @endif --}}
                                </tr>
                                @endforeach
                                @else 
                            
                                    <h5>No se encontro resultados</h5>
                                
                            @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            {!! $productos->links()!!}
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
        title: 'Producto creado exitosamente',
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
        title: 'Producto modificado exitosamente',
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
                title: '??Est?? seguro?',
                text: "No ser?? capaz de revertir esto!",
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

