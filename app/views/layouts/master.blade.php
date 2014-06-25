<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Tiuna | @yield('title')</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="shortcut icon" href="/images/logo2.png">
<link rel="stylesheet" href="/css/app.v1.css" type="text/css" />
<link rel="stylesheet" href="/js/calendar/bootstrap_calendar.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>
<body class="">
<section class="vbox">
  <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
    <div class="navbar-header aside-md dk"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="index.html" class="navbar-brand"><img src="/images/logo2.png" class="m-r-sm">Rescate Tiuna</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="fa fa-cog"></i> </a> </div>
    <!--
    <ul class="nav navbar-nav hidden-xs">
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-grid"></i> </a>
        <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
          <div class="row m-l-none m-r-none m-t m-b text-center">
            <div class="col-xs-4">
              <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-mail i-2x text-primary-lt"></i> </span> <small class="text-muted">Mailbox</small> </a> </div>
            </div>
            <div class="col-xs-4">
              <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-calendar i-2x text-danger-lt"></i> </span> <small class="text-muted">Calendar</small> </a> </div>
            </div>
            <div class="col-xs-4">
              <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-map i-2x text-success-lt"></i> </span> <small class="text-muted">Map</small> </a> </div>
            </div>
            <div class="col-xs-4">
              <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-paperplane i-2x text-info-lt"></i> </span> <small class="text-muted">Trainning</small> </a> </div>
            </div>
            <div class="col-xs-4">
              <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-images i-2x text-muted"></i> </span> <small class="text-muted">Photos</small> </a> </div>
            </div>
            <div class="col-xs-4">
              <div class="padder-v"> <a href="#"> <span class="m-b-xs block"> <i class="i i-clock i-2x text-warning-lter"></i> </span> <small class="text-muted">Timeline</small> </a> </div>
            </div>
          </div>
        </section>
      </li>
    </ul>
    -->
    <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search" method="post" action="/patient/search">
      <div class="form-group">
        <div class="input-group"> <span class="input-group-btn">
          <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
          </span>
          <input type="text" name="search" class="form-control input-sm no-border" placeholder="Búsqueda">
        </div>
      </div>
    </form>
    <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
    <!--
      <li class="hidden-xs"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="i i-chat3"></i> <span class="badge badge-sm up bg-danger count">2</span> </a>
        <section class="dropdown-menu aside-xl animated flipInY">
          <section class="panel bg-white">
            <header class="panel-heading b-light bg-light"> <strong>You have <span class="count">2</span> notifications</strong> </header>
            <div class="list-group list-group-alt"> <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="images/a0.jpg" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css<br>
              <small class="text-muted">10 minutes ago</small> </span> </a> <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br>
              <small class="text-muted">1 hour ago</small> </span> </a> </div>
            <footer class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </footer>
          </section>
        </section>
      </li>
    -->
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="/images/avatar.png"> </span> {{ Auth::user()->login }} <b class="caret"></b> </a>
        <ul class="dropdown-menu animated fadeInRight">
          <span class="arrow top"></span>
          <!--
          <li> <a href="#">Configuración</a> </li>
          <li> <a href="profile.html">Perfil</a> </li>
          <li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notificaciones </a> </li>
          -->
          <li> <a href="/auth/password">Cambiar Contraseña</a> </li>
          <li class="divider"></li>
          
          <li> <a href="/auth/logout" data-toggle="ajaxModal" >Salir</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch">
      <!-- .aside -->
      <aside class="bg-black aside-md hidden-print" id="nav">
        <section class="vbox">
          <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-color="#333333">
                <!--
              <div class="clearfix wrapper dk nav-user hidden-xs">
                <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb avatar pull-left m-r"> <img src="images/a0.jpg"> <i class="on md b-black"></i> </span> <span class="hidden-nav-xs clear"> <span class="block m-t-xs"> <strong class="font-bold text-lt">John.Smith</strong> <b class="caret"></b> </span> <span class="text-muted text-xs block">Art Director</span> </span> </a>
                  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <span class="arrow top hidden-nav-xs"></span>
                    <li> <a href="#">Settings</a> </li>
                    <li> <a href="profile.html">Profile</a> </li>
                    <li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a> </li>
                    <li> <a href="docs.html">Help</a> </li>
                    <li class="divider"></li>
                    <li> <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a> </li>
                  </ul>
                </div>
              </div>
          -->
              <!-- nav -->
              <nav class="nav-primary hidden-xs">
                <ul class="nav nav-main" data-ride="collapse">
                  <li class="active"> <a href="/" class="auto"> <i class="i i-statistics icon"> </i> <span class="font-bold">Escritorio</span> </a> </li>
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <!-- <b class="badge bg-danger pull-right">4</b> --> <i class="i i-stack icon"> </i> <span class="font-bold">Personal</span> </a>
                    <ul class="nav dk">
                      <li > <a href="/patient" class="auto"> <i class="i i-dot"></i> <span>Ver Todos</span> </a> </li>
                      <li > <a href="/patient/mayor" class="auto"> <i class="i i-dot"></i> <span>Ver Mayores</span> </a> </li>
                      <li > <a href="/patient/minor" class="auto"> <i class="i i-dot"></i> <span>Ver Menores</span> </a> </li>
                      <li> <a href="#table" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-dot"></i> <span>Ver por Mes</span> </a>
                        <ul class="nav dker">
                          <li> <a href="/patient/january"> <i class="i i-dot"></i> <span>Enero</span> </a> </li>
                          <li> <a href="/patient/february"> <i class="i i-dot"></i> <span>Febrero</span> </a> </li>
                          <li> <a href="/patient/march"> <i class="i i-dot"></i> <span>Marzo</span> </a> </li>
                          <li> <a href="/patient/april"> <i class="i i-dot"></i> <span>Abril</span> </a> </li>
                          <li> <a href="/patient/may"> <i class="i i-dot"></i> <span>Mayo</span> </a> </li>
                          <li> <a href="/patient/june"> <i class="i i-dot"></i> <span>Junio</span> </a> </li>
                          <li> <a href="/patient/july"> <i class="i i-dot"></i> <span>Julio</span> </a> </li>
                          <li> <a href="/patient/august"> <i class="i i-dot"></i> <span>Agosto</span> </a> </li>
                          <li> <a href="/patient/september"> <i class="i i-dot"></i> <span>Septiembre</span> </a> </li>
                          <li> <a href="/patient/october"> <i class="i i-dot"></i> <span>Octubre</span> </a> </li>
                          <li> <a href="/patient/november"> <i class="i i-dot"></i> <span>Noviembre</span> </a> </li>
                          <li> <a href="/patient/december"> <i class="i i-dot"></i> <span>Diciembre</span> </a> </li>
                        </ul>
                      </li>
                      <li > <a href="/patient/active" class="auto"> <i class="i i-dot"></i> <span>Personal Activo</span> </a> </li>
                      <li > <a href="/patient/inactive" class="auto"> <i class="i i-dot"></i> <span>Personal Inactivo</span> </a> </li>
                      <li > <a href="/patient/create" class="auto"> <i class="i i-dot"></i> <span>Añadir</span> </a> </li>
                      <li > <a href="/patient/update" class="auto"> <i class="i i-dot"></i> <span>Editar</span> </a> </li>
                    </ul>
                  </li>
                  <!--
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-lab icon"> </i> <span class="font-bold">Medicamentos</span> </a>
                    <ul class="nav dk">
                      <li > <a href="buttons.html" class="auto"> <i class="i i-dot"></i> <span>Ver</span> </a> </li>
                      <li > <a href="icons.html" class="auto"> <b class="badge bg-info pull-right">Añadir</b> <i class="i i-dot"></i> <span>Editar</span> </a> </li>
                      <li > <a href="grid.html" class="auto"> <i class="i i-dot"></i> <span>Eliminar</span> </a> </li>
                    </ul>
                  </li>
                -->
                  <!--
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-docs icon"> </i> <span class="font-bold">Pages</span> </a>
                    <ul class="nav dk">
                      <li > <a href="profile.html" class="auto"> <i class="i i-dot"></i> <span>Profile</span> </a> </li>
                      <li > <a href="invoice.html" class="auto"> <i class="i i-dot"></i> <span>Invoice</span> </a> </li>
                      <li > <a href="intro.html" class="auto"> <i class="i i-dot"></i> <span>Intro</span> </a> </li>
                      <li > <a href="master.html" class="auto"> <i class="i i-dot"></i> <span>Master</span> </a> </li>
                      <li > <a href="gmap.html" class="auto"> <i class="i i-dot"></i> <span>Google Map</span> </a> </li>
                      <li > <a href="jvectormap.html" class="auto"> <i class="i i-dot"></i> <span>Vector Map</span> </a> </li>
                      <li > <a href="signin.html" class="auto"> <i class="i i-dot"></i> <span>Signin</span> </a> </li>
                      <li > <a href="signup.html" class="auto"> <i class="i i-dot"></i> <span>Signup</span> </a> </li>
                      <li > <a href="404.html" class="auto"> <i class="i i-dot"></i> <span>404</span> </a> </li>
                    </ul>
                  </li>
                  <li > <a href="#" class="auto"> <span class="pull-right text-muted"> <i class="i i-circle-sm-o text"></i> <i class="i i-circle-sm text-active"></i> </span> <i class="i i-grid2 icon"> </i> <span class="font-bold">Apps</span> </a>
                    <ul class="nav dk">
                      <li > <a href="mail.html" class="auto"> <b class="badge bg-success lt pull-right">2</b> <i class="i i-dot"></i> <span>Mailbox</span> </a> </li>
                      <li > <a href="fullcalendar.html" class="auto"> <i class="i i-dot"></i> <span>Calendar</span> </a> </li>
                    </ul>
                  </li>
              -->
                </ul>

                <div class="line dk hidden-nav-xs"></div>
                <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm">Información</div>
                <ul class="nav">
                  <li> <a href="/contact"> <i class="i i-circle-sm text-info-dk"></i> <span>Contacto</span> </a> </li>
                  <li> <a href="/help"> <i class="i i-circle-sm text-success-dk"></i> <span>Ayuda</span> </a> </li>
                  <li> <a href="/developers"> <i class="i i-circle-sm text-danger-dk"></i> <span>Desarrolladores</span> </a> </li>
                </ul>
              </nav>
              <!-- / nav -->
            </div>
          </section>
          <footer class="footer hidden-xs no-padder text-center-nav-xs"> <a href="/auth/logout" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs"> <i class="i i-logout"></i> </a> <a href="#nav" title="Salis del sistema" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs"> <i class="i i-circleleft text"></i> <i class="i i-circleright text-active"></i> </a> </footer>
        </section>
      </aside>
      <!-- /.aside -->
      <section id="content">
        <section class="hbox stretch">
          <section>
            <section class="vbox">
              <section class="scrollable padder">

                @yield('content')
                <!--
                
          -->
            </section>
          </section>    
          <!-- / side content -->
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
<!-- Bootstrap -->
<!-- App -->
<script src="/js/app.v1.js"></script>
<script src="/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="/js/charts/sparkline/jquery.sparkline.min.js"></script>
<script src="/js/charts/flot/jquery.flot.min.js"></script>
<script src="/js/charts/flot/jquery.flot.tooltip.min.js"></script>
<script src="/js/charts/flot/jquery.flot.spline.js"></script>
<script src="/js/charts/flot/jquery.flot.pie.min.js"></script>
<script src="/js/charts/flot/jquery.flot.resize.js"></script>
<script src="/js/charts/flot/jquery.flot.grow.js"></script>
<script src="/js/charts/flot/demo.js"></script>
<script src="/js/calendar/bootstrap_calendar.js"></script>
<script src="/js/calendar/demo.js"></script>
<script src="/js/sortable/jquery.sortable.js"></script>
<script src="/js/app.plugin.js"></script>
</body>
</html>