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

    <title>Netcook | Crear receta</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpg" href="../img/service/miniatura.png">
    <!-- Favicon -->
  </head>
  <body class="gris-800">
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


    <div class="container-fluid d-flex flex-column custom-vh-100 justify-content-center">
      <div class="row">
        <div class="col-12 col-md-2"></div>
        <div class="col-12 col-md-8 py-5">
          <div class="card text-light verde-azul-600">
            <div class="card-body">
              <h2 class="card-title">Crea una nueva receta</h2>
              <form class="py-3" action="../libraries/create_recipe.php" method="POST" enctype="multipart/form-data">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="campo-nombre" class="form-label">Nombre de la receta</label>
                        <input type="text" name="nombre" id="campo-nombre" class="form-control" aria-describedby="ayuda-nombre" autocomplete="off" required>
                        <div id="ayuda-nombre" class="form-text texto-gris-200">
                          De esta manera la gente podrá encontrar tu receta más fácilmente
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="campo-ingredientes" class="form-label">Ingredientes</label>
                        <textarea name="ingredientes" id="campo-ingredientes" cols="30" rows="5" class="form-control" aria-describedby="ayuda-ingredientes" required></textarea>
                        <div id="ayuda-ingredientes" class="form-text texto-gris-200">
                          ¿Qué recursos se necesitan para preparar tu receta?
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="campo-utensilios" class="form-label">Utensilios (opcional)</label>
                        <textarea name="utensilios" id="campo-utensilios" cols="30" rows="5" class="form-control" aria-describedby="ayuda-utensilios"></textarea>
                        <div id="ayuda-utensilios" class="form-text texto-gris-200">
                          ¿Qué herramientas se necesitan para preparar tu receta?
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="campo-proceso" class="form-label">Proceso</label>
                        <textarea name="proceso" id="campo-proceso" cols="30" rows="5" class="form-control" aria-describedby="ayuda-proceso" required></textarea>
                        <div id="ayuda-proceso" class="form-text texto-gris-200">
                          ¿Cómo se prepara tu receta?
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="campo-extras" class="form-label">Extras (opcional)</label>
                        <textarea name="extras" id="campo-extras" cols="30" rows="5" class="form-control" aria-describedby="ayuda-extras"></textarea>
                        <div id="ayuda-extras" class="form-text texto-gris-200">
                          ¿Hay algo que no encaje en ninguna de las áreas anteriores pero sea importante? Anótalo aquí
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-3 mb-3">
                      <select name="categoría1" id="campo-categoría1" class="form-select" aria-label="Selección de categoría" required>
                        <option selected disabled>De la categoría...</option>
                        <?php
                        
                          include_once("../libraries/categories.php");

                          $categorías = new ComboCategorías;
                          $categorías -> colocarCategorías();
                        
                        ?>
                      </select>
                    </div>
                    <div class="col-12 col-lg-3 mb-3">
                      <select name="categoría2" id="campo-categoría2" class="form-select" aria-label="Selección de categoría">
                        <option selected disabled>Y, opcionalmente...</option>
                        <?php
                        
                          include_once("../libraries/categories.php");

                          $categorías = new ComboCategorías;
                          $categorías -> colocarCategorías();
                        
                        ?>
                      </select>
                    </div>
                    <div class="col-12 col-lg-3 mb-3">
                      <select name="categoría3" id="campo-categoría3" class="form-select" aria-label="Selección de categoría">
                        <option selected disabled>Y, opcionalmente...</option>
                        <?php
                        
                          include_once("../libraries/categories.php");

                          $categorías = new ComboCategorías;
                          $categorías -> colocarCategorías();
                        
                        ?>
                      </select>
                    </div>
                    <div class="col-12 col-lg-3 mb-3">
                      <select name="categoría4" id="campo-categoría4" class="form-select" aria-label="Selección de categoría">
                        <option selected disabled>Y, opcionalmente...</option>
                        <?php
                        
                          include_once("../libraries/categories.php");

                          $categorías = new ComboCategorías;
                          $categorías -> colocarCategorías();
                        
                        ?>
                      </select>
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                      <label for="campo-foto1" class="form-label">Fotografía del platillo</label>
                      <input type="file" name="foto1" id="campo-foto1" class="form-control" required>
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                      <label for="campo-foto2" class="form-label">Fotografía del platillo (opcional)</label>
                      <input type="file" name="foto2" id="campo-foto2" class="form-control">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                      <label for="campo-foto3" class="form-label">Fotografía del platillo (opcional)</label>
                      <input type="file" name="foto3" id="campo-foto3" class="form-control">
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="campo-url" class="form-label">URL del vídeo (opcional)</label>
                        <input type="text" name="url" id="campo-url" class="form-control" aria-describedby="ayuda-url" autocomplete="off">
                        <div id="ayuda-url" class="form-text texto-gris-200">
                          Si así lo deseas, sube un vídeo de tu receta a alguna plataforma y coloca aquí el código de incrustación HTML
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-4">
                      <input type="submit" name="crear" id="botón-ingresar" value="Crear receta" class="btn text-light verde-azul-800">
                    </div>
                    <div class="col-12 col-lg-8 text-start text-lg-end">
                      <p class="text-dark fw-bold">¿Quieres cancelar el proceso?<a href="create_share.php" class="link-dark fst-italic text-decoration-none"> ¡Vuelve a tus recetas!</a></p>
                    </div>
                  </div>
                </div>
              </form><br>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-2"></div>
      </div>
    </div>


    <?php

    include_once("footer.php");

    ?>


    <!-- JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- JS -->
  </body>
</html>