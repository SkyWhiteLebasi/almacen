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
                                <h3 class="card-title">Kardex</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Numero de orden</th>
                                            <th>Nombre del producto</th>
                                            <th>Inventario inicial</th>
                                            <th>Entradas</th>
                                            <th>Salidas</th>
                                            <th>Stock del producto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                            <tr>
                                                <td> {{ $producto->id }} </td>
                                                <td> {{ $producto->num_orden }} </td>
                                                <td> {{ $producto->nombre_pr }} </td>
                                                <td> {{ $producto->inicial }} </td>
                                                <td> {{ $producto->entradas }} </td>
                                                <td> {{ $producto->salidas }} </td>
                                                <td> {{ $producto->stock }} </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                    {{-- {!! $produc->links() !!} --}}
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
