@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
    			<label>Fecha de ingreso al sistema: </label>
    			<p>{{$recibo->fecha}}</p>
    		</div>
    	</div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="proveedor">Ingresado por:</label>
            	<p>{{$recibo->ingresadopor}}</p>
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="proveedor">Recibido de:</label>
            	<p>{{$recibo->recibidode}}</p>
            </div>
    	</div>
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          <div class="form-group">
              <label for="impuesto">Nit:</label>
              <p>{{$recibo->nit}}</p>
          </div>
      </div>
      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label >Fecha de emisión:</label>
                <p>{{$recibo->fecha_emision}}</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="num_comprobante">No. Recibo:</label>
                <p>{{$recibo->idrecibo}}</p>
            </div>
        </div>

      <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
        <div class="form-group">
              <label for="proveedor">Estado:</label>
              <p>{{$recibo->estado}}</p>
            </div>
      </div>




    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color:#A9D0F5">

                            <th>En concepto de</th>
                            <th>Subtotal</th>

                        </thead>
                        <tfoot>
                            <tr>
                                <th  colspan=""><p align="right">TOTAL:</p></th>
                                <th><p align="right">Q. {{$recibo->cantidad}}</p></th>
                            </tr>

                        </tfoot>
                        <tbody>

                            <tr>
                                <td>{{$recibo->tipo}}</td>


                                <td align="right">Q. {{$recibo->cantidad}}</td>
                            </tr>

                        </tbody>
                    </table>
                 </div>
            </div>
        </div>

    </div>
    <a href="{{url('bomberos/recibo')}}" class="btn btn-success" >Regresar</a>
@push ('scripts')
<script>
$('#liVentas').addClass("treeview active");
$('#liVentass').addClass("active");
</script>
@endpush
@endsection
