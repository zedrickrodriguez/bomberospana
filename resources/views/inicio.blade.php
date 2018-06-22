<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('home/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" href="{{asset('assets/ico/favicon.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Bomberos Voluntarios</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="{{asset('home/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('home/assets/css/material-kit.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">


    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{asset('home/assets/css/demo.css')}}" rel="stylesheet" />

</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar  navbar-fixed-top navbar-color-on-scroll navbar-danger">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="#">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="{{asset('assets/ico/bomber.jpg')}}" >
	                </div>
	                <div class="brand">
	                    Bomberos Voluntarios
	                </div>


				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">

	    	<li>
	    		<a href="{{url('login')}}"><i class="fa fa-lock"></i>Iniciar Sesión</a>
	    	</li>






	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header" style="background-image: url('assets/img/backgrounds/3.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>¡Bienvenido!</h1>
						<h3><strong>Bomberos Voluntarios <br>33ava Compañía</h3>
						<p>Calle Principal<br>
							Panajachel, Sololá</strong>

						</p>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">
					<div class="row">
				  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				  		<h3>Consulta de Ingresos</h3>
				  		{!! Form::open(array('method'=>'GET','autocomplete'=>'off')) !!}

				  		<div class="form-group">

				  				<div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12">
				  					<label for="searchText1">Fecha inicio: </label> <input type="date" class="form-control"
				  					name="searchText1"  >
				  				</div>
				  				<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
				  					<label for="searchText2">Fecha fin: </label><input type="date" class="form-control"
				  					name="searchText2"  >
				  				</div>

				  				<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
				  					<button type="submit"  class="btn btn-danger">Ver</button>
				  				</div>



				  		</div>

				  		{{Form::close()}}
				  	</div>
				  </div>
					<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h4><strong>Datos del: </strong>{{$searchText1}} <strong> al: </strong>{{$searchText2}}</h4>



												<table class="table">
													<thead>
														<tr >
															<th>Rubro</th>
															<th>Ingreso</th>
															<th>Total de recibos</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$t=0.00;
														$r=0;

														foreach($recibo as $rec){?>
														<tr>
															<td><?php echo $rec->tipo;?></td>
															<td><?php echo $rec->total;?></td>
															<td><?php echo $rec->tot;?></td>

														</tr>
														<?php
														$t=$t+($rec->total);
														$r=$r+($rec->tot);
													}?>
													</tbody>
													<tfoot >
														<tr >
															<td><strong>Totales</strong></td>
															<td><strong><?php echo $t;?></strong></td>
															<td><strong><?php echo $r ;?></strong></td>
														</tr>

													</tfoot>
												</table>


							</div>
					</div>

	            </div>
	            </div>





	</div>
    <footer class="footer">
	    <div class="container">
	        <nav class="pull-left">
	            <ul>
					<li>
						<a href="#">
							15 ave. 0-06 zona 1, Quetzaltenango
						</a>
					</li>
					<li>
						<a href="#">
						Teléfono: 4178-6018
						</a>
					</li>

	            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; 2017,  <i class=""></i> by GlibSoftware.
	        </div>
	    </div>
	</footer>
</div>

<!-- Sart Modal -->

<!--  End Modal -->


</body>
	<!--   Core JS Files   -->
	<script src="{{asset('/home/assets/js/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/home/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/home/assets/js/material.min.js')}}"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{asset('../home/assets/js/nouislider.min.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="{{asset('/home/assets/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="{{asset('/home/assets/js/material-kit.js')}}" type="text/javascript"></script>
	<script src="{{asset('/home/js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')

	<script type="text/javascript">

		$().ready(function(){
			// the body of this function is in assets/material-kit.js
			materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}

		});
	</script>
</html>
