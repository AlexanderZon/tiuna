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
  <h3 class="m-b-none">Personal</h3>
</div>
<section class="panel panel-default">
  <header class="panel-heading font-bold"> Formulario de registro de personal </header>
  <div class="panel-body">
    <form class="form-horizontal" id="create_symptom" method="post">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nombres</label>
        <div class="col-sm-10">
          <input id="title" name="first_name" type="text" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Apellidos</label>
        <div class="col-sm-10">
          <input id="description" name="last_name" type="text" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Cédula</label>
        <div class="col-sm-10">
          <input id="description" name="passport" type="text" class="form-control" required>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Teléfono</label>
        <div class="col-sm-10">
          <input id="description" name="phone_number" type="text" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Teléfono de Emergencia</label>
        <div class="col-sm-10">
          <input id="description" name="emergency_number" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Correo</label>
        <div class="col-sm-10">
          <input id="description" name="email" type="text" class="form-control" required>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Lugar de Nacimiento</label>
        <div class="col-sm-10">
          <input id="born_place" name="born_place" type="text" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Fecha de Nacimiento</label>
        <div class="col-sm-10">
          <input id="born_date" name="born_date" type="date" class="form-control" required>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Dirección</label>
        <div class="col-sm-10">
          <input id="address" name="address" type="text" class="form-control" required>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Nombre Completo del Representante</label>
        <div class="col-sm-10">
          <input id="representant_name" name="representant_name" type="text" class="form-control">
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Parentesco del Representante</label>
        <div class="col-sm-10">
          <input id="representant_type" name="representant_type" type="text" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <a href="/patient" class="btn btn-default">Volver</a>
          <input type="submit" class="btn btn-primary" value="Crear" />
        </div>
      </div>
    </form>
  </div>
</section>

@stop