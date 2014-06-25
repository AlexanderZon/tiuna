@extends('layouts.master')

@section('title')
Escritorio
@stop

@section('content')

<section class="row m-b-md">
  <div class="col-sm-6">
    <h3 class="m-b-xs text-black">Escritorio</h3>
    <small>Bienvenido, {{ 'Administrador' }}</small> </div>
  
</section>

<div class="row">
  <div class="col-md-3 col-sm-6">
    <div class="panel b-a">
      <a href="http://www.facebook.com">
        <div class="panel-heading no-border bg-primary lt text-center"> <i class="fa fa-facebook fa fa-3x m-t m-b text-white"></i> </div>
      </a>
      <a href="http://www.twitter.com/">
        <div class="panel-heading no-border bg-info lter text-center"> <i class="fa fa-twitter fa fa-3x m-t m-b text-white"></i> </div>
      </a>
    </div>
  </div>
  <div class="col-sm-9">
    <img src="/images/background.jpeg" width="100%"class="m-r-sm">
  </div>
  
  <div class="col-sm-3 hide">
    <section class="panel b-a">
      <header class="panel-heading b-b b-light">
        <ul class="nav nav-pills pull-right">
          <li> <a href="ajax.pie.html" class="text-muted" data-bjax data-target="#b-c"> <i class="i i-cycle"></i> </a> </li>
          <li> <a href="#" class="panel-toggle text-muted"> <i class="i i-plus text-active"></i> <i class="i i-minus text"></i> </a> </li>
        </ul>
        Connection </header>
      <div class="panel-body text-center bg-light lter" id="b-c">
        <div class="easypiechart inline m-b m-t" data-percent="60" data-line-width="4" data-bar-Color="#23aa8c" data-track-Color="#c5d1da" data-color="#2a3844" data-scale-Color="false" data-size="120" data-line-cap='butt' data-animate="2000">
          <div> <span class="h2 m-l-sm step"></span>%
            <div class="text text-xs">completed</div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</section>

@stop