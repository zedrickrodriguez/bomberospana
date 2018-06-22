@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar rubro: {{ $rubro->tipo}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($rubro,['method'=>'PATCH','route'=>['bomberos.rubro.update',$rubro->idrubro]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="tipo" class="form-control" value="{{$rubro->tipo}}" placeholder="Nombre...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
							<a href="{{url('bomberos/rubro')}}" class="btn btn-success" >Regresar</a>
            </div>

			{!!Form::close()!!}

		</div>
	</div>

@endsection
