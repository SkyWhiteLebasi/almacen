@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('user/create')}}" class="btn btn-info">Registrar nuevo usuarios</a></li>
    
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Email</th>
              <th scope="col">Rol</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <th scope="row">{{$user->id}} </th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->rol}}</td>
              <td>
                <a href="{{ url('/user/'.$user->id.'/edit'),  }}" class="btn btn-warning">editar</a>
                |
               <form action="{{ url('/user/'.$user->id) }}" class="d-inline" method ="POST">
                   @csrf
                   {{method_field('DELETE')}}
                   <input type="submit" class="btn btn-danger" onclick ="return confirm('¿quieres borrar we?')" value="borrar">
               </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


   
    
{!! $users->links()!!} <!--en controlador de empleado, en la función index se tiene el paginate y este se realciona con links -->
</div>
@endsection