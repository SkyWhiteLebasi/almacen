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
                                    @can('salida.salidadiaria')
                                    <a href="{{ url('salida/salidadiaria') }}" type="button" class="btn btn-pastel1">  <i class="fas fa-folder-plus"></i> Registrar salida diaria</a>
                                    @endcan
                                    @can('salida.import-excel')
                                    <a href="{{ url('salida/import-excel') }}" type="button"class="btn btn-pastel2"> <i class="fas fa-file-excel"></i> Importar excel</a>
                                    @endcan
                                    @can('salida.pdf_nutricion')
                                    <a href="{{ url('salida/pdf_nutricion') }}" type="button" class="btn btn-pastel3"><i class="fas fa-file-pdf"></i> Imprimir</a>
                                    @endcan
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Fecha</th>
                                            <th>Observacion</th>
                                            {{-- <th>Modificacion</th> --}}
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($nutricion as $salida)
                                            {{-- @if ($pedido->semana_id == $sema->semana_id){ --}}
                                            <tr>

                                                <td> {{ $salida->id }} </td>
                                                <td> {{ $salida->nombre_pr }}</td>
                                                <td> {{ $salida->cant_salida }} </td>
                                                <td> {{ $salida->fecha_salida }} </td>
                                                <td> {{ $salida->obs_salida }} </td>
                                                {{-- <td> {{ $salida->updated_at }} </td> --}}
                                                <td>
                                                    {{-- @if(auth()->user()->rol=='admin') --}}
                                                    @can('salida.edit')
                                                    <a href="{{ url('/salida/'.$salida->id.'/edit'),  }}" class="btn btn-pastel1"><i class="fas fa-check"></i> Validar</a>
                                            {{-- |       @endif --}}
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
                                    {{-- {!! $nutricion->links() !!} --}}
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
        title: 'Un producto de salida diaria creado exitosamente',
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
        title: 'Un producto de salida diaria modificado exitosamente',
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
