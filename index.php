<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dicionário de Argumentos Reacionários</title>

    <!-- Bootstrap -->
    <link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Bibliotecas externas -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/angular/angular.min.js"></script>
    <script src="assets/bower_components/angular-route/angular-route.min.js"></script>
    <script src="assets/bower_components/angular-resource/angular-resource.min.js"></script>

    <!-- Bibliotecas internas -->
    <script type="text/javascript" src="app/app.js"></script>
    <script type="text/javascript" src="app/controllers/argumentos/argumentosController.js"></script>
    <script type="text/javascript" src="app/controllers/argumentos/novoArgumentoController.js"></script>
    <script type="text/javascript" src="app/controllers/argumentos/argumentoController.js"></script>
    <script type="text/javascript" src="app/controllers/usuarios/novoUsuarioController.js"></script>
    <script type="text/javascript" src="app/controllers/sessoes/novaSessaoController.js"></script>
    <script type="text/javascript" src="app/services/models/argumento.js"></script>
    <script type="text/javascript" src="app/services/models/usuario.js"></script>
  </head>

  <body ng-app="dicionario">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#/" class="navbar-brand">Dicionário de Argumentos Reacionários</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="#/argumentos/new">Novo argumento</a></li>
            <li><a href="#/usuarios/new">Cadastro</a></li>
            <?php
              if($_SESSION['USER_ID']) {
                echo '<li>Logado</li>';
              } else {
                echo '<li><a href="#/sessoes/new">Login</a></li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" id="main-container">
      <div ng-view></div>
    </div>
  </body>
</html>
