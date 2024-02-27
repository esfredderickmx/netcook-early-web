<?php

    include_once("../libraries/user.php");
    include_once("../libraries/user_session.php");

    $sesión = new Sesión();
    $usuario = new Usuario();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Etiquetas meta requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Etiquetas meta requeridas -->

    <!-- CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- CSS -->

    <title>Netcook | Crea y gestiona tus recetas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpg" href="../img/service/miniatura.png">
    <!-- Favicon -->
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark verde-600">
      <div class="container">
        <a href="../libraries/session_index.php" class="navbar-brand">
          <img src="../img/service/logo.png" class="d-inline-block align-text-top" width="104.45" height="58.15" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#barra-nav-inicio" aria-controls="barra-nav-inicio" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="barra-nav-inicio">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
            <li class="nav-item">
              <a href="../libraries/session_index.php" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item">
              <a href="create_share.php" class="nav-link active" aria-current="page">Crear y gestionar</a>
            </li>
            <li class="nav-item">
              <a href="../views/contact.php" class="nav-link">Contacto</a>
            </li>
          </ul>
          <div class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
            <li class="nav-item">
              <a href="" class="nav-link">
                <?php

                  if(isset($_SESSION['usuario'])){
                    $usuario -> establecerUsuario($sesión -> obtenerActual());
                    echo $usuario -> obtenerUsuario();
                  }

                ?>
              </a>
            </li>
            <li class="nav-item">
              <a href="../libraries/kill_session.php" class="nav-link">Salir</a>
            </li>
          </div>
        </div>
      </div>
    </nav>


    <?php
              
      include_once("../libraries/own_recipes.php");
    
      if(isset($_POST['ver'])){

        $receta = new VistaReceta;
        
        $receta -> verReceta($usuario -> obtenerId(), $_POST['ver']);
      }else if(isset($_POST['calificar'])){
        $receta = new VistaReceta;

        $receta -> calificarReceta($usuario -> obtenerId(), $_POST['calificar'], $_POST['calificación']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['calificar']);
      }else if(isset($_POST['favorito-sí'])){
        $receta = new VistaReceta;

        $receta -> marcarFavorita($usuario -> obtenerId(), $_POST['favorito-sí']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['favorito-sí']);
      }else if(isset($_POST['favorito-no'])){
        $receta = new VistaReceta;

        $receta -> desmarcarFavorita($usuario -> obtenerId(), $_POST['favorito-no']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['favorito-no']);
      }else if(isset($_POST['guardar-sí'])){
        $receta = new VistaReceta;

        $receta -> guardarReceta($usuario -> obtenerId(), $_POST['guardar-sí']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['guardar-sí']);
      }else if(isset($_POST['guardar-no'])){
        $receta = new VistaReceta;

        $receta -> noGuardarReceta($usuario -> obtenerId(), $_POST['guardar-no']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['guardar-no']);
      }else if(isset($_POST['realizar'])){
        $receta = new VistaReceta;

        $receta -> realizarReceta($usuario -> obtenerId(), $_POST['realizar']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['realizar']);
      }else if(isset($_POST['comentar'])){
        $receta = new VistaReceta;

        $receta -> comentarReceta($usuario -> obtenerId(), $_POST['comentar'], $_POST['comentario']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['comentar']);
      }else{?>
        <main class="text-dark py-3 gris-800">
          <div class="container">
            <form action="" class="my-3">
              <div class="row">
                <div class="col-12 my-1 my-lg-0">
                  <a type="submit" name="buscar" id="buscar" href="create_recipe.php" class="btn amarillo-800 text-light w-100">Crear una nueva receta</a>
                </div>
              </div>
            </form>
            <div class="row">
              <h1 class="text-center display-5 text-light">Tus recetas</h1>
              <?php

                $receta = new VistaReceta;

                if(isset($_POST['eliminar'])){
                  $receta -> eliminarReceta($_POST['eliminar']);
                  $receta -> mostrarRecetas($usuario -> obtenerId());
                }else{
                  $receta -> mostrarRecetas($usuario -> obtenerId());
                }

              ?>
            </div>
          </div>
        </main><?php

      }

    ?>


    <?php

    include_once("footer.php");

    ?>


    <!-- JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- JS -->
  </body>
</html>