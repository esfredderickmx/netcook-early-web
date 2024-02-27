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

    <title>Netcook | Contacto</title>

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
              <h2 class="card-title">Contáctanos</h2>
              <?php
              
                if(isset($hecho)){?>
                  <p class="h6 text-dark"><?php echo $hecho; ?></p><?php
                }
              
              ?>
              <form class="py-3" action="../libraries/send_mail.php" method="POST">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 col-lg-5">
                      <div class="mb-3">
                        <label for="campo-nombre" class="form-label">Nombre: </label>
                        <input type="text" name="nombre" id="campo-nombre" class="form-control" aria-describedby="ayuda-nombre" autocomplete="off" required>
                        <div id="ayuda-nombre" class="form-text texto-gris-200">
                          Ingresa tu nombre real, así podremos dirigirnos cordialmente hacia ti
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-7">
                      <div class="mb-3">
                        <label for="campo-correo" class="form-label">Correo electrónico: </label>
                        <input type="email" name="correo" id="campo-correo" class="form-control" aria-describedby="ayuda-correo" autocomplete="off" required>
                        <div id="ayuda-correo" class="form-text texto-gris-200">
                          Facilita un correo electrónico al que podamos responder
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="campo-comentario" class="form-label">Duda/queja/sugerencia/comentario en general: </label>
                        <textarea name="comentario" id="campo-comentario" cols="30" rows="5" class="form-control" aria-describedby="ayuda-comentario" autocomplete="off" required></textarea>
                        <div id="ayuda-comentario" class="form-text texto-gris-200">
                          Déjanos un comentario sobre cualquier asunto de los mencionados en la parte superior
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-4">
                      <input type="submit" name="enviar" id="botón-enviar" value="Enviar comentario" class="btn text-light amarillo-800">
                    </div>
                    <div class="col-12 col-lg-8 text-start text-lg-end">
                      <p class="text-dark fw-bold">¿No sabes dónde estás?<a href="../libraries/session_index.php" class="link-dark fst-italic text-decoration-none"> ¡Vuelve a la página de inicio!</a></p>
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