
    @extends('backend.layouts.app')

    @section('content')
        <div class="content-wrapper">
            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Crear un nuevo producto</h3>
                                </div>
                                <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="num_orden"> Numero de Orden</label>
                                        <input type="text" class="form-control" name="num_orden"
                                            value="{{ isset($producto->num_orden) ? $producto->num_orden : old('num_orden') }}"
                                            placeholder="numero de orden" id="num_orden">
                                    </div>

                                    <div class="form-group">
                                        <label for="nombre"> Nombre Producto</label>
                                        <input type="text" class="form-control" name="nombre_pr"
                                            value="{{ isset($producto->nombre_pr) ? $producto->nombre_pr : old('nombre_pr') }}"
                                            placeholder="nombre del producto" id="nombre_pr">
                                    </div>

                                    <div class="form-group">
                                        <label for="categoria_id">Categoria</label>
                                        <select class="form-control" name='categoria_id' id="exampleFormControlSelect1">
                                            @foreach ($categ as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->nombre_categoria }} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="medida_id">Unidad de Medida</label>
                                        <select class="form-control" name='medida_id' id="medida_id">
                                            @foreach ($med as $me)
                                                <option value="{{ $me->id }}">{{ $me->nombre_medida }} </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="stock"> Stock</label>
                                        <input type="integer" class="form-control" name="stock" name="inicial"
                                            value="{{ isset($producto->stock) ? $producto->stock : old('stock') }}"
                                            placeholder="stock" id="stock" id="inicial">
                                    </div>

                                    {{-- <div class="form-group">
                                        <input type="integer" class="form-control" name="inicial"
                                            value="0"
                                            placeholder="inicial" id="inicial">
                                    </div> --}}
                                   

                                    <div class="form-group">
                                        <label for="correo"> Descripcion </label>
                                        <input type="text" class="form-control"name="desc_pr"
                                            value="{{ isset($producto->desc_pr) ? $producto->desc_pr : old('desc_pr') }}"
                                            placeholder="descripcion del producto" id="desc_pr">
                                    </div>

                                    <div class="form-group">
                                        <label for="foto"> Foto </label>
                                        @if (isset($producto->foto))
                                            <img class="img-thumbnail img-fluid"
                                                src="{{ asset('storage') . '/' . $producto->foto }}" width="100px"
                                                alt="">
                                        @endif
                                        <input type="file" class="form-control" name="foto" value=""
                                            id="foto">
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a href="{{ url('producto/') }}" class="btn btn-success"> Regresar </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    @endsection
