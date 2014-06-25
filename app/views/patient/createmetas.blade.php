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
  <h3 class="m-b-none">Personal</h3>
</div>
<section class="panel panel-default">
  <header class="panel-heading font-bold"> Formulario de registro de Ficha Médica </header>
  <div class="panel-body">
    <form class="form-horizontal" id="createmetas" method="post" action="/patient/createmetas">
    	<input type="hidden" name="id" value="{{ $id }}"/>
      <div class="form-group">
        <label class="col-sm-2 control-label">Grupo Sanguíneo</label>
        <div class="col-sm-10">
          <select name="blood_group" id="blood_group" class="form-control">
          	<option value="null">[SELECCIONE]</option>
          	<option value="A">A</option>
          	<option value="AB">AB</option>
          	<option value="B">B</option>
          	<option value="O">O</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Factor RH</label>
        <div class="col-sm-10">
          <select name="rh_factor" id="rh_factor" class="form-control">
          	<option value="null">[SELECCIONE]</option>
          	<option value='Positivo'>Positivo</option>
          	<option value='Negativo'>Negativo</option>
          </select>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Hernias</label>
        <div class="col-sm-10">
          <div class="checkbox i-checks">
            <label>
              <input type="checkbox" name="hernia[]" value="Inguinal Directa">
              <i></i> Inguinal Directa </label>
          </div>
          <div class="checkbox i-checks">
            <label>
              <input type="checkbox" name="hernia[]" value="Inguinal Indirecta">
              <i></i> Inguinal Indirecta </label>
          </div>
          <div class="checkbox i-checks">
            <label>
              <input type="checkbox" name="hernia[]" value="Femoral">
              <i></i> Femoral </label>
          </div>
          <div class="checkbox i-checks">
            <label>
              <input type="checkbox" name="hernia[]" value="Incisional">
              <i></i> Incisional </label>
          </div>
          <div class="checkbox i-checks">
            <label>
              <input type="checkbox" name="hernia[]" value="Umbilical">
              <i></i> Umbilical </label>
          </div>
          <div class="checkbox i-checks">
            <label>
              <input type="checkbox" name="hernia[]" value="Epiglástica">
              <i></i> Epiglástica </label>
          </div>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Alergia</label>
        <div class="col-sm-10">
          <input id="allergy" name="allergy" type="text" class="form-control" placeholder="Especifique las alergias del paciente si posee">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Fractura</label>
        <div class="col-sm-10">
          <input id="fracture" name="fracture" type="text" class="form-control" placeholder="Especifique las fracturas del paciente si posee">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Tensión Arterial</label>
        <div class="col-sm-10">
          <select name="blood_pressure" class="form-control">
          	<option value="Normal">Normal</option>
          	<option value="Alta">Alta</option>
          	<option value="Baja">Baja</option>
          </select>
        </div>
      </div>
    <div class="line line-dashed b-b line-lg pull-in"></div>
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
          <input type="submit" class="btn btn-primary" value="Añadir Ficha" />
        </div>
      </div>
    </form>
  </div>
</section>

<script type="text/javascript">

	$(document).on('ready', function(){

		$('#createmetas').on('submit', function(){
			if($('#blood_group').val() == 'null'){
				alert('Debe seleccionar un Grupo Sanguíneo');
				return false;
			}
			else if($('#rh_factor').val() == 'null'){
				alert('Debe seleccionar un Factor RH');
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

	function validateForm(){
		alert("Hola Mundo");
		if($('#blood_group').val() == null){
			$.jGrowl('jsiwjsiwjsi');
			return false;
		}
		else{
			return false;
		}
	}

</script>

@stop