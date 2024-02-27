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

    <title>Netcook | Regístrate</title>

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
          <div class="card text-light amarillo-600">
            <div class="card-body">
              <h2 class="card-title">Afíliate a Netcook</h2>
              <?php

              if(isset($error_ambos)){?>
                <p class="h6 text-dark"><?php echo $error_ambos; ?></p><?php
              }

              if(isset($error_correo)){?>
                <p class="h6 text-dark"><?php echo $error_correo; ?></p><?php
              }

              if(isset($error_usuario)){?>
                <p class="h6 text-dark"><?php echo $error_usuario; ?></p><?php
              }
              
              ?>
              <form class="py-3" action="../libraries/add_user.php" method="POST">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="campo-correo" class="form-label">Correo electrónico: </label>
                        <input type="email" name="correo" id="campo-correo" class="form-control" aria-describedby="ayuda-correo" autocomplete="off" required>
                        <div id="ayuda-correo" class="form-text texto-gris-200">
                          Ingresa tu correo electrónico personal
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="mb-3">
                        <label for="campo-usuario" class="form-label">Nombre de usuario: </label>
                        <input type="text" name="usuario" id="campo-usuario" class="form-control" aria-describedby="ayuda-usuario" autocomplete="off" required>
                        <div id="ayuda-usuario" class="form-text texto-gris-200">
                          Sé original, tu nombre de usuario te identificará ante los demás
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="mb-3">
                        <label for="campo-contraseña" class="form-label">Contraseña: </label>
                        <input type="password" name="contraseña" id="campo-contraseña" class="form-control" aria-describedby="ayuda-contraseña" autocomplete="off" required>
                        <div id="ayuda-contraseña" class="form-text texto-gris-200">
                          Utiliza una combinación de al menos 8 carácteres que contengan, por lo menos, 1 letra mayúscula, 1 letra minúscula, 1 dígito y 1 carácter especial
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="mb-3">
                        <label for="campo-nombre" class="form-label">Nombre(s): </label>
                        <input type="text" name="nombre" id="campo-nombre" class="form-control" aria-describedby="ayuda-nombre" autocomplete="off" required>
                        <div id="ayuda-nombre" class="form-text texto-gris-200">
                          Nombre(s) de identidad real
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="mb-3">
                        <label for="campo-apellido" class="form-label">Apellido(s): </label>
                        <input type="text" name="apellido" id="campo-apellido" class="form-control" aria-describedby="ayuda-apellido" autocomplete="off" required>
                        <div id="ayuda-apellido" class="form-text texto-gris-200">
                          Apellido(s) de identidad real
                        </div>
                      </div>
                    </div>
                    <div class="col-4">
                      <input type="submit" name="registrar" id="botón-registrar" value="Registrarse" class="btn text-light amarillo-800">
                    </div>
                    <div class="col-12 col-lg-8 text-start text-lg-end">
                      <p class="text-dark fw-bold">¿Ya tienes una cuenta?<a href="../libraries/session_index.php" class="link-dark fst-italic text-decoration-none"> ¡Ingresa aquí!</a></p>
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