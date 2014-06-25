@extends('layouts.master')

@section('title')
Personal
@stop

@section('content')
<script src="/js/jquery-1.11.1.min.js"></script>
<div class="m-b-md">
  <h3 class="m-b-none">Personal</h3>
</div>
<section class="panel panel-default">
  <div class="row wrapper">
    <div class="col-sm-5 m-b-xs">
      <h4>Listado de Personal Registrados </h4>

    </div>
    <div class="col-sm-4 m-b-xs">
        <a href="/patient/create" class="btn btn-sm btn-default" type="button">Agregar nuevo</a>
    </div>
    <div class="col-sm-3">
      <form method="post" action="/patient/search">
        <div class="input-group">
          <input type="text" name="search" class="input-sm form-control" placeholder="Búsqueda"/>
          <span class="input-group-btn">
          <input class="btn btn-sm btn-default" type="submit" value="Buscar"/>
          </span> 
        </div>
      </form>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
          <th>Cédula</th>
          <th class="th-sortable" data-toggle="class">Nombre Completo <!-- <span class="th-sort"> <i class="fa fa-sort-down text"></i> <i class="fa fa-sort-up text-active"></i> <i class="fa fa-sort"></i> </span> --> </th>
          <th>Teléfonos</th>
          <th>Fecha de Nacimiento</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($patients as $patient)
        <tr>
          <td><a href="/patient/view/{{ $patient->id }}">{{ $patient->passport }}</a></td>
          <td>{{ $patient->last_name . ', ' . $patient->first_name }}</td>
          <td>Celular: {{ $patient->phone_number }} / <span style="color:#E33">Emergencia: {{ $patient->phone_number }}</span></td>
          <td>{{ $patient->born_date }}</td>
          <td>
            &nbsp;
            <a href="/patient/fracture/{{ $patient->id }}" class="active" title="Agregar Fractura"><i class="fa fa-wheelchair text-primary text-active"></i></a>
            &nbsp;
            <a href="/patient/allergy/{{ $patient->id }}" class="active" title="Agregar Alergia"><i class="fa fa-asterisk text-primary text-active"></i></a>
            &nbsp;
            <a href="/patient/hernia/{{ $patient->id }}" class="active" title="Agregar Hernia"><i class="fa fa-bug text-primary text-active"></i></a>
            &nbsp;
            <a href="/patient/drug/{{ $patient->id }}" class="active" title="Agregar Ingesta de Fármaco"><i class="fa fa-medkit text-primary text-active"></i></a>
            &nbsp;
            <a href="/patient/update/{{ $patient->id }}" class="active" title="Editar Personal"><i class="fa fa-pencil text-warning text-active"></i></a>
            &nbsp;
            @if($patient->status == 'active')
            <a href="/patient/desactivate/{{ $patient->id }}" class="active" title="Desactivar Personal"><i class="fa fa-trash-o text-danger text-active"></i></a>
            @else
            <a href="/patient/activate/{{ $patient->id }}" class="active" title="Desactivar Personal"><i class="fa fa-thumbs-o-up text-success text-active"></i></a>
            @endif
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <footer class="panel-footer">
    <div class="row">
      <div class="col-sm-4 hidden-xs">
      </div>
      <div class="col-sm-4 text-center"> <small class="text-muted inline m-t-sm m-b-sm">{{ count($patients) }} Resultados </small> </div>
      <!--
      <div class="col-sm-4 text-right text-center-xs">
        <ul class="pagination pagination-sm m-t-none m-b-none">
          <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
        </ul>
      </div>
      -->
    </div>
  </footer>
</section>
<!-- Bootstrap -->
<!-- App -->
<!-- datepicker -->
@stop