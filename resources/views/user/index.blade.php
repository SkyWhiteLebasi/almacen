@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><a href="{{ url('user/create')}}" class="btn btn-pastel1">  <i class="fas fa-folder-plus"></i> Registrar nuevo usuario</a>
            </h3>
            {{-- <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div> --}}
          </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
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
                <a href="{{ url('/user/'.$user->id.'/edit'),  }}" class="btn btn-pastel1"><i class="fas fa-pencil-alt"></i> Editar rol</a>
                |
               <form action="{{ url('/user/'.$user->id) }}" id="form-eliminar" class="d-inline" method ="POST">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-pastel4"><i
                        class="fas fa-trash-alt"></i> Borrar</button>
               </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            {!! $users->links()!!}
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
          </div>
    </div>
    <!-- /.card -->
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
        title: 'Usuario creado exitosamente',
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
