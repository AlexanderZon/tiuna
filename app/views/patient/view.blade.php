@extends('layouts.master')

@section('title')
Nuevo Personal
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
  <h3 class="m-b-none"> Personal </h3>
</div>
<section class="panel panel-default">
  <header class="panel-heading font-bold"> Datos de Personal </header>
  <div class="panel-body">

    <!--<form class="form-horizontal" id="create_symptom" method="post">-->
      <div class="form-group">
        <span class="col-sm-2 control-label">Nombres: </span>
        <div class="col-sm-2">
          <span>{{ $patient->first_name }}</span>
        </div>
        <span class="col-sm-2 control-label">Apellidos: </span>
        <div class="col-sm-2">
          <span>{{ $patient->last_name }}</span>
        </div>
        <span class="col-sm-2 control-label">Cédula: </span>
        <div class="col-sm-2">
          <span>{{ $patient->passport }}</span>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <span class="col-sm-2 control-label" for="input-id-1">Correo: </span>
        <div class="col-sm-4">
          <span>{{ $patient->email }}</span>
        </div>
        <span class="col-sm-2 control-label" for="input-id-1">Teléfono: </span>
        <div class="col-sm-4">
          <span>{{ $patient->phone_number }}</span>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <span class="col-sm-2 control-label" for="input-id-1">Representante: </span>
        <div class="col-sm-4">
          <span>
            @if($patient->representant_name != '')
            {{ $patient->representant_name }} ({{ $patient->representant_type }})
            @else
            (Vacío)
            @endif
          </span>
        </div>
        <span class="col-sm-2 control-label" for="input-id-1">Teléfono de Emergencia: </span>
        <div class="col-sm-4">
          <span>{{ $patient->emergency_number }}</span>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <span class="col-sm-2 control-label" for="input-id-1">Lugar de Nacimiento: </span>
        <div class="col-sm-4">
          <span >{{ $patient->born_place }}</span>
        </div>
        <span class="col-sm-2 control-label" for="input-id-1">Fecha de Nacimiento: </span>
        <div class="col-sm-4">
          <span >{{ $patient->born_date }}</span>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <span class="col-sm-2 control-label" for="input-id-1">Dirección: </span>
        <div class="col-sm-10">
          <span>{{ $patient->address }}</span>
        </div>
      </div>
    <!--</form>-->
  </div>
  <header class="panel-heading font-bold"> Ficha Médica </header>
  <div class="panel-body">
    <!--<form class="form-horizontal" id="create_symptom" method="post">-->
      <div class="form-group">
        <span class="col-sm-2 control-label">Grupo Sanguíneo: </span>
        <div class="col-sm-2">
          <span>{{ $metas['blood_group'] }}</span>
        </div>
        <span class="col-sm-2 control-label">Factor RH: </span>
        <div class="col-sm-2">
          <span>{{ $metas['rh_factor'] }}</span>
        </div>
        <span class="col-sm-2 control-label">Presión Arterial: </span>
        <div class="col-sm-2">
          <span>{{ $metas['blood_pressure']['description'] }}</span>
        </div>
      </div>
      @if(isset($metas['hernia']))
      @if(count($metas['hernia']) > 0)
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <span class="col-sm-2 control-label">Henias: </span>
        <div class="col-sm-4">
        	<table>
        	@foreach($metas['hernia'] as $hernia)
        		<tr><td><span>{{ $hernia['description'] }}</span></td>
              <td>&nbsp;</td>
              <td><a href="/patient/deletemeta/{{ $hernia['id'] }}" class="active" title="Eliminar Hernia"><i class="fa fa-trash-o text-danger text-active"></i></a></td>
            </tr>
          	@endforeach
          </table>
        </div>
      </div>
      @endif
      @endif
      @if(isset($metas['allergy']))
      @if(count($metas['allergy']) > 0)
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <span class="col-sm-2 control-label">Alergias: </span>
        <div class="col-sm-4">
        	<table>
        	@foreach($metas['allergy'] as $allergy)
        		<tr><td><span>{{ $allergy['description'] }}</span>
            </td>
              <td>&nbsp;</td>
            <td><a href="/patient/deletemeta/{{ $allergy['id'] }}" class="active" title="Eliminar Alergia"><i class="fa fa-trash-o text-danger text-active"></i></a></td>
          </tr>
          	@endforeach
          </table>
        </div>
      </div>
      @endif
      @endif
      @if(isset($metas['fracture']))
      @if(count($metas['fracture']) > 0)
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <span class="col-sm-2 control-label">Fracturas: </span>
        <div class="col-sm-4">
        	<table>
        	@foreach($metas['fracture'] as $fracture)
        		<tr>
              <td><span>{{ $fracture['description'] }}</span></td>
              <td>&nbsp;</td>
              <td><a href="/patient/deletemeta/{{ $fracture['id'] }}" class="active" title="Eliminar Fractura"><i class="fa fa-trash-o text-danger text-active"></i></a></td>
            </tr>
          	@endforeach
          </table>
        </div>
      </div>
      @endif
      @endif
      @if(isset($metas['drug_intake']))
      @if(count($metas['drug_intake']) > 0)
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <span class="col-sm-2 control-label">Ingestas de Farmacos: </span>
        <div class="col-sm-10">
        	<table>
        	@foreach($metas['drug_intake'] as $drug_intake)
        		<tr>
        			<td style="padding: 1em"><span>Fármaco: {{ $drug_intake['description']->drug }}</span></td>
        			<td style="padding: 1em"><span>Dósis por Unidad: {{ $drug_intake['description']->dose }}</span></td>
        			<td style="padding: 1em"><span>Frecuencia por Hora: {{ $drug_intake['description']->frecuency }}</span></td>
              <td>
            <a href="/patient/deletemeta/{{ $drug_intake['id'] }}" class="active" title="Eliminar Fármaco"><i class="fa fa-trash-o text-danger text-active"></i></a>
          </td>
        		</tr>
          	@endforeach
          </table>
        </div>
      </div>
      @endif
      @endif
    <!--</form>-->
  </div>
</section>
<section class="panel panel-default">
<div style="text-align:right; margin:1em;">
  <a href="/patient/fracture/{{ $patient->id }}" class="btn btn-primary">Añadir Fractura</a>
  <a href="/patient/allergy/{{ $patient->id }}" class="btn btn-primary">Añadir Alergia</a>
  <a href="/patient/hernia/{{ $patient->id }}" class="btn btn-primary">Añadir Hernia</a>
  <a href="/patient/drug/{{ $patient->id }}" class="btn btn-primary">Añadir Fármaco</a>
  <a href="/patient" class="btn btn-default">Volver</a>
</div>
</section>

@stop