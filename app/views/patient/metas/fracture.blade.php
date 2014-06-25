@extends('layouts.master')

@section('title')
Nuevo Paciente
@stop

@section('content')

<div class="m-b-md">
  <h3 class="m-b-none">{{ 'NOMBRE' }}</h3>
</div>
<section class="panel panel-default">
  <header class="panel-heading font-bold"> Formulario de registro de Fractura </header>
  <div class="panel-body">
    <form class="form-horizontal" id="createmetas" method="post" >
      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-id-1">Fractura</label>
        <div class="col-sm-10">
          <input id="fracture" name="fracture" type="text" class="form-control" placeholder="Especifique la fractura del personal si posee" required>
        </div>
      </div>
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <a href="/patient" class="btn btn-default">Volver</a>
          <input type="submit" class="btn btn-primary" value="Añadir Fractura" />
        </div>
      </div>
    </form>
  </div>
</section>

@stop