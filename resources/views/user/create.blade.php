@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <style>
            * {
                box-sizing: border-box;
            }

            /* Style the input container */
            .personalizo .input-container {
                display: flex;
                width: 100%;
                margin-bottom: 15px;
            }

            /* Style the form icons */
            .personalizo .icon {
                padding: 10px;
                background: rgb(128, 115, 4);
                color: white;
                min-width: 50px;
                text-align: center;
            }

            /* Style the input fields */
            .personalizo .input-field {
                width: 100%;
                padding: 10px;
                outline: none;
            }

            .personalizo .input-field:focus {
                border: 2px solid dodgerblue;
            }

            /* Set a style for the submit button */
            .personalizo .row .btn {
                background-color: rgb(128, 115, 4);
                color: white;
                padding: 15px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .personalizo .row .btn:hover {
                opacity: 2;
            }
        </style>
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card ">
                            <div class="card-header card-pastel5">
                                <h3 class="card-title">Crear una nueva entrada</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <label for="nombre"> Nombre del Usuario</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="ingrese nombre del usuario">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="nombre"> Email</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="email"
                                                placeholder="ingrese su email" id="nombre_pr">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="nombre"> Contraseña</label>
                                        <div class="col-md-7">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="ingrese su contraseña" id="nombre_pr">
                                        </div>

                                    </div>
                                    <br>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-pastel2">guardar</button>
                                        <a href="{{ url('user/') }}" class="btn btn-pastel1"> Regresar </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
