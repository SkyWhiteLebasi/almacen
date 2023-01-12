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
                                <h3 class="card-title">Cantidad de salidas por cada producto</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Producto</th>
                                            <th>Número de Salidas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($salidas as $salida)
                                            <tr>
                                                <td> {{ $num++}} </td>
                                                <td> {{ $salida->producto->nombre_pr }} </td>
                                                <td> {{ $salida->mira }} </td>

                                            </tr>
                                            {{-- {{$num++;}} --}}
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
