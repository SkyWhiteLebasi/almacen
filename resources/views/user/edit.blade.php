
@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    
    <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>
  
        <form action="{{route('user.update',$user)}}" method="post">

            @csrf
          @method('put')
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" value=" {{ isset($user->name)?$user->name:old('name') }} " id="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" value="{{ isset($user->email)?$user->email:old('email') }}" id="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="rol" class="form-control" value="{{ isset($user->rol)?$user->rol:old('rol') }}" id="rol" id="rol">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" value=" {{ isset($user->password)?$user->password:old('password') }} " id="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </div>
            <!-- /.col -->
          </div>
    </form>
</div>
@endsection