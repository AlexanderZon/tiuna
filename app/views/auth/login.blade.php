<!DOCTYPE html>
<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>Rescate Tiuna</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="/css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
</head>
<body class="">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
  <div class="container aside-xl"> <a class="navbar-brand block" href="index.html">Rescate Tiuna</a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong>Inicie Sesión para usar la aplicación</strong> </header>
      @if(isset($err))
      <header class="wrapper text-center"> <strong>{{ $err }}</strong> </header>
      @endif
      <form action="/auth/login" method="post">
        <div class="list-group">
          <div class="list-group-item">
            <input type="text" name="login" placeholder="Usuario" class="form-control no-border">
          </div>
          <div class="list-group-item">
            <input type="password" name="password" placeholder="Contraseña" class="form-control no-border">
          </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
        <div class="text-center m-t m-b"><a href="#"><small>¿Olvidaste tu contraseña?</small></a></div>
        <div class="line line-dashed"></div>
      </form>
    </section>
  </div>
</section>
<!-- footer -->
<footer id="footer">
  <div class="text-center padder">
    <p> <small>Aplcación Basada en Laravel<br>
      &copy; 2014</small> </p>
  </div>
</footer>
<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="/js/app.v1.js"></script>
<script src="/js/app.plugin.js"></script>
</body>
</html>