@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Recibo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'bomberos/recibo','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label >Número de recibo: </label>
            	<input type="number" name="idrecibo" value="{{old('idrecibo')}}" required placeholder="No. recibo..." class="form-control">
            </div>
    	</div>
    	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    		<div class="form-group">
            	<label >Fecha de emisión: </label>
            	<input type="date" name="fecha_emision" value="{{old('fecha_emision')}}" required class="form-control" placeholder="Fecha de emisión...">
            </div>
    	</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label >Nit: </label>
                <input type="number" name="nit" value="{{old('nit')}}" class="form-control" placeholder="Nit...">
            </div>
        </div>
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    		<div class="form-group">
    			<label>Recibido de: </label>
    			<input type="text" name="recibidode" value="{{old('recibidode')}}" required class="form-control" placeholder="Recibido de...">
    		</div>
    	</div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <label for="direccion">Dirección: </label>
                <input type="text" value="{{old('direccion')}}" name="direccion" value="" required class="form-control" placeholder="Dirección...">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label>En concepto de: </label>
                        <select name="idrubro" class="form-control selectpicker" id="idrubro" required data-live-search="true">
													@foreach($recibos as $recibo)
													<option value="{{$recibo->idrubro}}">{{$recibo->tipo}}</option>
													@endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad">La cantidad de:</label>
                        <input id="cantidad" value="{{old('cantidad')}}" type="text" name="cantidad" required class="form-control"
                        placeholder="Total...">
                    </div>
                </div>
								<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad"></label>
                        <input type="text" name="ingresadopor" required class="form-control"
                        placeholder="" value="{{ Auth::user()->name }}" readonly style="visibility:hidden">
                    </div>
                </div>





            </div>
        </div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
    		<div class="form-group">

                <button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
							<a href="{{url('bomberos/recibo')}}" class="btn btn-success" >Regresar</a>
            </div>
    	</div>
    </div>
			{!!Form::close()!!}


@endsection
