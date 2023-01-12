@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">

        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-pastel5">
                                <h3 class="card-title">Asignar rol</h3>
                            </div>
                            <div class="card-body">
                            {!! Form::model($user, ['route' => ['user.update', $user], 'method' => 'put']) !!}
                            @foreach ($roles as $rol)
                                <div>
                                    <label>
                                        {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1']) !!}
                                        {{ $rol->name }}
                                    </label>
                                </div>
                            @endforeach
                            {!! Form::submit('Asignar rol', ['class' => 'btn btn-pastel1']) !!}
                            {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
