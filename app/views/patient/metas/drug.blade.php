@extends('layouts.master')

@section('title')
Nuevo Paciente
@stop

@section('content')

<style type="text/css">
  .jGrowl .jGrowl-notification, .jGrowl .jGrowl-closer, .jGrowl-notification .jGrowl-closer{
      backgroud-color: #dd2222,
      opacity: 0.8
  }
</style>

<link rel="stylesheet" href="/js/jgrowl/jquery.jgrowl.min.css" type="text/css" />
<link rel="stylesheet" href="/js/chosen/chosen.min.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->

<script src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/jgrowl/jquery.jgrowl.min.js"></script>
<script type="text/javascript" src="/js/chosen/chosen.jquery.min.js"></script>
<div class="m-b-md">
  <h3 class="m-b-none">{{ 'NOMBRE' }}</h3>
</div>
<section class="panel panel-default">
  <header class="panel-heading font-bold"> Formulario de registro de Ingesta de Fármaco </header>
  <div class="panel-body">
    <form class="form-horizontal" id="createmetas" method="post" >
    <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Ingiere Algún Farmaco</label>
        <div class="col-sm-10">
		    <input id="drug" name="drug" type="text" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-xs-2 control-label" for="input-id-1">&nbsp;</label>
		<label class="col-xs-2 control-label" for="input-id-1">Dosis por Unidad</label>
        <div class="col-lg-8">
          <input id="dose" name="dose" type="number" class="form-control">
        </div>
    </div>
	<div class="form-group">
		<label class="col-xs-2 control-label" for="input-id-1">&nbsp;</label>
		<label class="col-xs-2 control-label" for="input-id-1">Frecuencia por hora</label>
        <div class="col-lg-8">
          <input id="frecuency" name="frecuency" type="number" class="form-control">
        </div>
    </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <a href="/patient" class="btn btn-default">Volver</a>
          <input type="submit" class="btn btn-primary" value="Añadir Fármaco" />
        </div>
      </div>
    </form>
  </div>
</section>


<script type="text/javascript">

	$(document).on('ready', function(){

		$('#createmetas').on('submit', function(){
			if($('#drug').val() == ''){
				alert('Debes especificar el fármaco');
				return false;
			}
			else if($('#drug').val() != ''){
				if($('#dose').val() == ''){
					alert('Debes especificar la dosis de ingesta de ' + $('#drug').val());
					return false;
				}
				else if($('#frecuency').val() == ''){
					alert('Debes especificar la frecuencia por hora de la ingesta de ' + $('#drug').val());
					return false;
				}
			}
			else if($('#dose').val() != '' && $('#drug').val() == ''){
					alert('Debes especificar el fármaco');
					return false;
				}
			else if($('#frecuency').val() != '' && $('#drug').val() == ''){
					alert('Debes especificar el fármaco');
					return false;
				}
			else{
				return true;
			}

		});

	});

</script>

@stop