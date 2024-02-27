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

    <title>Netcook | Inicio</title>

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
              <a href="../libraries/session_index.php" class="nav-link active" aria-current="page">Inicio</a>
            </li>
            <li class="nav-item">
              <a href="../views/create_share.php" class="nav-link">Crear y gestionar</a>
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
              
      include_once("../libraries/recipes_views.php");
    
      if(isset($_POST['ver'])){

        $receta = new VistaRecetaInicio;
        
        $receta -> verReceta($usuario -> obtenerId(), $_POST['ver']);
      }else if(isset($_POST['calificar'])){
        $receta = new VistaRecetaInicio;

        $receta -> calificarReceta($usuario -> obtenerId(), $_POST['calificar'], $_POST['calificación']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['calificar']);
      }else if(isset($_POST['favorito-sí'])){
        $receta = new VistaRecetaInicio;

        $receta -> marcarFavorita($usuario -> obtenerId(), $_POST['favorito-sí']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['favorito-sí']);
      }else if(isset($_POST['favorito-no'])){
        $receta = new VistaRecetaInicio;

        $receta -> desmarcarFavorita($usuario -> obtenerId(), $_POST['favorito-no']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['favorito-no']);
      }else if(isset($_POST['guardar-sí'])){
        $receta = new VistaRecetaInicio;

        $receta -> guardarReceta($usuario -> obtenerId(), $_POST['guardar-sí']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['guardar-sí']);
      }else if(isset($_POST['guardar-no'])){
        $receta = new VistaRecetaInicio;

        $receta -> noGuardarReceta($usuario -> obtenerId(), $_POST['guardar-no']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['guardar-no']);
      }else if(isset($_POST['realizar'])){
        $receta = new VistaRecetaInicio;

        $receta -> realizarReceta($usuario -> obtenerId(), $_POST['realizar']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['realizar']);
      }else if(isset($_POST['comentar'])){
        $receta = new VistaRecetaInicio;

        $receta -> comentarReceta($usuario -> obtenerId(), $_POST['comentar'], $_POST['comentario']);
        $receta -> verReceta($usuario -> obtenerId(), $_POST['comentar']);
      }else{?>
        <main class="text-dark py-3 gris-800">
          <div class="container">
            <form action="../libraries/home_recipes.php" method="POST" class="my-3">
              <fieldset>
                <legend class="text-light h3">Buscar recetas</legend>
                <div class="row">
                  <div class="col-12 col-lg-4 my-1 my-lg-0">
                    <input type="text" name="búsqueda" id="campo-búsqueda" class="form-control" placeholder="Busquemos una receta de..." autocomplete="off">
                  </div>
                  <div class="col-12 col-lg-4 my-1 my-lg-0">
                    <select name="categoría" id="campo-categoría" class="form-select" aria-label="Selección de categoría">
                      <option selected disabled>De la recetas en la categoría de...</option>
                      <?php
                      
                        include_once("../libraries/categories.php");

                        $categorías = new ComboCategorías;
                        $categorías -> colocarCategorías();
                      
                      ?>
                    </select>
                  </div>
                  <div class="col-12 col-lg-2 my-1 my-lg-0">
                    <select name="orden" id="campo-orden" class="form-select" aria-label="Selección de orden">
                      <option selected disabled>Ordenadas por...</option>
                      <option value="ASC"># - Z</option>
                      <option value="DESC">Z - #</option>
                    </select>
                  </div>
                  <div class="col-12 col-lg-2 my-1 my-lg-0">
                    <button type="submit" name="buscar" id="buscar" class="btn amarillo-800 text-light w-100"><i class="bi bi-search"></i></button>
                  </div>
                </div>
              </fieldset>
            </form>
            <div class="row">
              <div class="col-12 col-lg-8 order-2 order-lg-1">
                <div class="row">
                  <?php
                  
                    include_once("../libraries/home_recipes.php");
                    
                    $recetas_inicio = new RecetasInicio;

                    if(isset($_POST['buscar'])){
                      if(isset($_POST['búsqueda']) and isset($_POST['categoría']) and isset($_POST['orden'])){
                        
                        $búsquedaFormulario = $_POST['búsqueda'];
                        $categoríaFormulario = $_POST['categoría'];
                        $ordenFormulario = $_POST['orden'];

                        $recetas_inicio -> filtroBCO($búsquedaFormulario, $categoríaFormulario, $ordenFormulario);
                      }else if(isset($_POST['búsqueda']) and isset($_POST['categoría'])){
                        
                        $búsquedaFormulario = $_POST['búsqueda'];
                        $categoríaFormulario = $_POST['categoría'];

                        $recetas_inicio -> filtroBC($búsquedaFormulario, $categoríaFormulario);
                      }else if(isset($_POST['búsqueda']) and isset($_POST['orden'])){
                        
                        $búsquedaFormulario = $_POST['búsqueda'];
                        $ordenFormulario = $_POST['orden'];

                        $recetas_inicio -> filtroBO($búsquedaFormulario, $ordenFormulario);
                      }else if(isset($_POST['búsqueda'])){
                        
                        $búsquedaFormulario = $_POST['búsqueda'];

                        $recetas_inicio -> filtroB($búsquedaFormulario);
                      }
                    }else if(isset($_POST['calcular'])){

                      $recetas_inicio -> calcularRanking();
                      $recetas_inicio -> mostrarRecetas();
                    }else{
                      $recetas_inicio -> mostrarRecetas();
                    }
                  
                  ?>
                </div>
              </div>
              <div class="col-12 col-lg-4 order-1 order-lg-2">
                <div class="row justify-content-end">
                  <div class="col-12 col-lg-9">
                    <div class="card my-3">
                      <div class="card-header">
                        <h5>Ranking semanal</h5>
                      </div>
                      <ul class="list-group list-group-flush">
                        <?php
                        
                          $recetas_inicio -> mostrarRanking($usuario -> obtenerId());

                        ?>
                      </ul>
                      <?php
                      
                        if($usuario -> obtenerTipo() == 1){?>
                          <div class="card-footer">
                            <form action="" method="POST">
                              <input type="submit" name="calcular" id="botón-calcular" class="btn verde-azul-600 w-100 text-light" value="Calcular ranking">
                            </form>
                          </div><?php
                        }
                      
                      ?>
                    </div>
                    <div class="card my-3">
                      <div class="card-header">
                        <h5>Favoritos</h5>
                      </div>
                      <ul class="list-group list-group-flush">
                        <?php
                        
                          $recetas_inicio -> mostrarFavoritos($usuario -> obtenerId());

                        ?>
                      </ul>
                    </div>
                    <div class="card my-3">
                      <div class="card-header">
                        <h5>Para ver después</h5>
                      </div>
                      <ul class="list-group list-group-flush">
                        <?php
                        
                          $recetas_inicio -> mostrarGuardados($usuario -> obtenerId());

                        ?>
                      </ul>
                      <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#" class="btn">Receta guardad 1</a></li>
                        <li class="list-group-item"><a href="#" class="btn">Receta guardad 2</a></li>
                      </ul> -->
                    </div>
                  </div>
                </div>
              </div>
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