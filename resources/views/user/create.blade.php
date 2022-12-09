@extends('backend.layouts.app')

@section('content')
<style>
    * {box-sizing: border-box;}

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
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Crear nuevo usuario</h1>
                </div>
                
              </div>
            </div><!-- /.container-fluid -->
          </section>
      
          <!-- Main content -->
        <section class="content">
    
            <div class="personalizo">
                <form action="{{ url('/user')}}" method="post" enctype="multipart/form-data">
                 
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input type="text" name="name" class="form-control" placeholder="Escriba su  nombre">
                    </div>
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input type="text" name="rol" class="form-control" placeholder="indique el rol: admin, nutricion, almacen">
                    </div>
                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input type="email" name="email" class="form-control" placeholder="Escriba su correo">
                    </div>
                    <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input type="password" name="password" class="form-control" placeholder="Escriba su contraseña">
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-warning btn-block">Registrar</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <a href="{{ url('user/')}}" class="btn btn-success"> Regresar </a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </form>
        </div>
    </div>
</section>
@endsection