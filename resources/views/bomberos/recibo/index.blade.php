@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Recibos <a href="recibo/create"><button class="btn btn-success">Nuevo</button></a> </h3>
		@include('bomberos.recibo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha de emisión</th>
					<th>No. Recibo</th>
					<th>Rubro</th>
					<th>Total</th>
					<th>Trabajado por</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($recibo as $rec)
				<tr>
					<td>{{ $rec->fecha_emision}}</td>
					<td>{{ $rec->idrecibo}}</td>
					<td>{{ $rec->tipo}}</td>
					<td>Q. {{ $rec->cantidad}}</td>
					<td>{{ $rec->ingresadopor}}</td>
					<td>{{ $rec->estado}}</td>
					<td>
						@if (auth()->user()->role==='admin')
						<a href="{{URL::action('ReciboController@edit',$rec->idrecibo)}}"><button class="btn btn-warning">Editar</button></a>
						@endif
						

						<a href="{{URL::action('ReciboController@show',$rec->idrecibo)}}"><button class="btn btn-primary">Detalles</button></a>

                         <a href="" data-target="#modal-delete-{{$rec->idrecibo}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('bomberos.recibo.modal')
				@endforeach
			</table>
		</div>
		{{$recibo->render()}}
	</div>
</div>


@endsection
