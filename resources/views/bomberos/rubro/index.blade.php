@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Rubros <a href="rubro/create"><button class="btn btn-success">Nuevo</button></a> </h3>
    @include('bomberos.rubro.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>

					<th>Opciones</th>
				</thead>
               @foreach ($rubro as $rub)
				<tr>
					<td>{{ $rub->idrubro}}</td>
					<td>{{ $rub->tipo}}</td>

					<td>
						<a href="{{URL::action('RubroController@edit',$rub->idrubro)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$rub->idrubro}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
        @include('bomberos.rubro.modal')
				@endforeach
			</table>
		</div>
		{{$rubro->render()}}
	</div>
</div>

@endsection
