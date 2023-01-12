@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    @can('salida.create')
                                    <a href="{{ url('salida/create') }}" type="button" class="btn btn-pastel1">  <i class="fas fa-folder-plus"></i> Registrar
                                        una nueva salida</a>
                                    @endcan
                                    @can('salida.import-excel-alm')
                                    <a href="{{ url('salida/import-excel-alm') }}" type="button" class="btn btn-pastel2"> <i class="fas fa-file-excel"></i> Importar excel validadas</a>
                                    @endcan
                                    <a href="{{ url('salida/pdf') }}" type="button"  class="btn btn-pastel3"><i class="fas fa-file-pdf"></i> Imprimir</a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Número de orden</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Fecha</th>
                                            <th>Observacion</th>
                                            
                                            {{-- <th>Modificacion</th> --}}
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        
                                        @foreach ($salidas as $salida)
                                            {{-- @if ($pedido->semana_id == $sema->semana_id){ --}}
                                            <tr>

                                                <td> {{ $salida->id }} </td>
                                                <td> {{ $salida->producto->num_orden }}</td>
                                                <td> {{ $salida->producto->nombre_pr }}</td>
                                                <td> {{ $salida->cant_salida_val }} </td>
                                                <td> {{ $salida->fecha_salida }} </td>
                                                <td> {{ $salida->obs_salida }} </td>
                                                
                                                {{-- <td> {{ $salida->updated_at }} </td> --}}
                                                <td>
                                                    @can('salida.editdos')
                                                    <a href="{{ url('/salida/'.$salida->id.'/editdos'),  }}" class="btn btn-pastel1"><i class="fas fa-pencil-alt"></i> Editar</a>
                                                    @endcan
                                                    @can('salida.destroy')
                                                    <form action="{{ url('/salida/' . $salida->id) }}" id="form-eliminar" class="d-inline"
                                                        method="POST">
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
                                    {!! $salidas->links() !!}
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
        title: 'Salida creado exitosamente',
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
        title: 'Salida modificado exitosamente',
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


