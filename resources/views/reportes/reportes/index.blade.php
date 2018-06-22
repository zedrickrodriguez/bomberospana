@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Reporte entre dos fechas</h3>
		{!! Form::open(array('url' => 'reportes','method'=>'GET','autocomplete'=>'off')) !!}

		<div class="form-group">

				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="searchText1">Fecha inicio: </label> <input type="date" class="form-control"
					name="searchText1"  >
				</div>
				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<label for="searchText2">Fecha fin: </label><input type="date" class="form-control"
					name="searchText2"  >
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="{{url('reportes')}}" target="_blank"><button type="submit"  class="btn btn-success">Generar Reporte</button></a>
					
				</div>



		</div>

		{{Form::close()}}
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h3>Reporte por rubro entre dos fechas</h3>
		{!! Form::open(array('url' => 'reportesxrubro','method'=>'GET','autocomplete'=>'off')) !!}

		<div class="form-group">
					<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>En concepto de: </label>
                        <select name="idrubro" class="form-control selectpicker" id="idrubro" required data-live-search="true">
													@foreach($recibos as $recibo)
													<option value="{{$recibo->idrubro}}">{{$recibo->tipo}}</option>
													@endforeach
                        </select>
                    </div>

				<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<label for="fecha1">Fecha inicio: </label> <input type="date" class="form-control"
					name="fecha1"  >
				</div>
				<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<label for="fecha2">Fecha fin: </label><input type="date" class="form-control"
					name="fecha2"  >
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="{{url('reportesxrubro')}}" target="_blank"><button type="submit"  class="btn btn-success">Generar Reporte</button></a>
					
				</div>



		</div>

		{{Form::close()}}
	</div>
</div>

@endsection
