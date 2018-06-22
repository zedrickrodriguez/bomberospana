@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Nuevo Usuario</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>

			</div>
			</div>
			@endif

			{!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
						<div class="row">


						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="name" >Nombre</label>


	                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

	                                @if ($errors->has('name'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif

	                        </div>
						</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" >Correo electrónico</label>


                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>
												</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" >Contraseña</label>


                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>
												</div>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" >Confirmar contraseña</label>


                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif

                        </div>
												</div>
<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
							<a href="{{url('seguridad/usuario')}}" class="btn btn-success" >Regresar</a>
            </div>
					</div>
</div>
			{!!Form::close()!!}




@endsection
