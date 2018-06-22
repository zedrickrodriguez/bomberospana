@extends('layouts.app')

@section('content')
<div class="col-sm-6 col-sm-offset-3 form-box">
  <div class="form-top">
    <div class="form-top-left">
      <h3>¡Bienvenido!</h3>
        <p>Ingrese su correo y contraseña para iniciar sesión:</p>
    </div>
    <div class="form-top-right">
      <i class="fa fa-lock"></i>
    </div>
    </div>
    <div class="form-bottom">
  <form role="form" action="{{ url('/login') }}" method="post" class="login-form" >
    {{ csrf_field() }}
    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">

        <label for="form-username" class="sr-only">Correo:</label>


            <input id="email" type="email" class="form-username form-control" name="email" value="{{ old('email') }}" placeholder="Correo electrónico...">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

    </div>
    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="form-password" class="sr-only">Password:</label>


            <input id="password" type="password" class="form-password form-control" name="password" placeholder="Contraseña...">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

    </div>
      <button type="submit" class="btn btn-danger">Ingresar</button>
  </form>
</div>
</div>
@endsection
