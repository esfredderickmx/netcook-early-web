<!doctype html>
<html lang="es">
  <head>
    <!-- Etiquetas meta requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Etiquetas meta requeridas -->

    <!-- CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- CSS -->

    <title>Netcook | Ingresa</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/jpg" href="../img/service/miniatura.png">
    <!-- Favicon -->

    <style>
      @media (min-width: 768px){
        .custom-vh-100{
          height: 100vh;
        }
      }
    </style>
    
  </head>
  <body class="gris-800">
    <div class="container d-flex flex-column custom-vh-100 justify-content-center">
      <div class="row">
        <div class="col-12 col-md-2"></div>
        <div class="col-12 col-md-8 py-3">
          <div class="card text-light naranja-600">
            <div class="card-body">
              <h2 class="card-title">Ingresa a tu cuenta de Netcook</h2>
              <?php
              
                if(isset($error_acceso)){?>
                <p class="h6 text-dark"><?php echo $error_acceso; ?></p><?php
                }
              
              ?>
              <form class="py-3" action="" method="POST">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 col-lg-7">
                      <div class="mb-3">
                        <label for="campo-usuario" class="form-label">Usuario: </label>
                        <input type="text" name="usuario" id="campo-usuario" class="form-control" aria-describedby="ayuda-usuario" autocomplete="off" required>
                        <div id="ayuda-correo" class="form-text texto-gris-200">
                          Ingresa el nombre de usuario de tu cuenta
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-5">
                      <div class="mb-3">
                        <label for="campo-contraseña" class="form-label">Contraseña: </label>
                        <input type="password" name="contraseña" id="campo-contraseña" class="form-control" aria-describedby="ayuda-contraseña" autocomplete="off" required>
                        <div id="ayuda-contraseña" class="form-text texto-gris-200">
                          Ingresa la contraseña de acceso a tu cuenta
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-4">
                      <input type="submit" name="ingresar" id="botón-ingresar" value="Ingresar" class="btn text-light naranja-800">
                    </div>
                    <div class="col-12 col-lg-8 text-start text-lg-end">
                      <p class="text-dark fw-bold">¿Aún no tienes una cuenta?<a href="../views/sign-in.php" class="link-dark fst-italic text-decoration-none"> ¡Regístrate aquí!</a></p>
                      <p class="text-dark fw-bold">¿No sabes dónde estás?<a href="../index.php" class="link-dark fst-italic text-decoration-none"> ¡Vuelve a la página principal!</a></p>
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

      include("footer.php");

    ?>
  
    <!-- JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- JS -->
  </body>
</html>