<?php

  include_once("database_connection.php");

  class VistaReceta extends BaseDeDatos{
    public function mostrarRecetas($usuario){

      $consulta = "SELECT * FROM receta WHERE id_usuario = $usuario";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){?>
          
          <div class="col-12 col-lg-4">
            <div class="card my-3">
              <img src="../img/upload/<?php echo $registro['foto1_receta']; ?>" class="card-img-top img-fluid" alt="nombre de la receta">
              <div class="card-body">
                <h4 class="card-title"><?php echo $registro['nombre_receta']; ?></h4>
                <p class="card-text"><?php echo $registro['corte_receta']; ?>...</p>
                <div>
                  <form action="" method="POST">
                    <button type="submit" class="btn naranja-600 text-light mb-2"><i class="bi bi-eye-fill"></i> Ver receta</button>
                    <input type="text" name="ver" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
                  </form>
                  <form action="" method="POST">
                    <button type="submit" class="btn rojo-600 text-light"><i class="bi bi-trash-fill"></i> Eliminar</button>
                    <input type="text" name="eliminar" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
                  </form>
                </div>
              </div>
            </div>
          </div><?php
        }
      }else{?>
          
          <div class="col-12 col-lg-4">
            <div class="card my-3">
              <img src="../img/image-cap.jpg" class="card-img-top img-fluid" alt="nombre de la receta">
              <div class="card-body">
                <h4 class="card-title">De esta forma</h4>
                <p class="card-text">Se mostrarán tus recetas en este apartado...</p>
                <div>
                  <form action="" method="POST">
                    <button type="submit" class="btn naranja-600 text-light mb-2"><i class="bi bi-eye-fill"></i> Ver receta</button>
                  </form>
                  <form action="" method="POST">
                    <button type="submit" class="btn rojo-600 text-light"><i class="bi bi-trash-fill"></i> Eliminar</button>
                  </form>
                </div>
              </div>
            </div>
          </div><?php
      }
    }

    public function verReceta($yo, $código){

      $consulta = "SELECT * FROM receta WHERE código_receta = $código";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows === 1){
        $registro = $resultado -> fetch_assoc();
        $usuario = $registro['id_usuario'];
        $consulta_usuario = "SELECT * FROM usuario WHERE id_usuario = $usuario";
        $resultado_usuario = $this -> Conexión() -> query($consulta_usuario);

        if($resultado -> num_rows === 1){
          $registro_usuario = $resultado_usuario -> fetch_assoc();
        }

        $consulta_calificación = "SELECT * FROM receta, calificar, usuario WHERE receta.código_receta = calificar.código_receta AND calificar.id_usuario = usuario.id_usuario AND receta.código_receta = $código AND usuario.id_usuario = $yo";
        $resultado_calificación = $this -> Conexión() -> query($consulta_calificación);
        if($resultado_calificación -> num_rows > 0){
          $registro_calificación = $resultado_calificación -> fetch_assoc();
          $calificada = $registro_calificación['calificación_calificar'];
        }else{
          $calificada = false;
        }

        $consulta_reacción = "SELECT * FROM receta, reaccionar, usuario WHERE receta.código_receta = reaccionar.código_receta AND reaccionar.id_usuario = usuario.id_usuario AND receta.código_receta = $código AND usuario.id_usuario = $yo";
        $resultado_reacción = $this -> Conexión() -> query($consulta_reacción);
        if($resultado_reacción -> num_rows > 0){
          $favorito = true;
        }else{
          $favorito = false;
        }
        
        $consulta_guardado = "SELECT * FROM receta, guardar, usuario WHERE receta.código_receta = guardar.código_receta AND guardar.id_usuario = usuario.id_usuario AND receta.código_receta = $código AND usuario.id_usuario = $yo";
        $resultado_guardado = $this -> Conexión() -> query($consulta_guardado);
        if($resultado_guardado -> num_rows > 0){
          $guardada = true;
        }else{
          $guardada = false;
        }
        
        $consulta_realización = "SELECT * FROM receta, realizar, usuario WHERE receta.código_receta = realizar.código_receta AND realizar.id_usuario = usuario.id_usuario AND receta.código_receta = $código AND usuario.id_usuario = $yo";
        $resultado_realización = $this -> Conexión() -> query($consulta_realización);
        if($resultado_realización -> num_rows > 0){
          $realizada = true;
        }else{
          $realizada = false;
        }?>

        <div class="gris-800 text-light py-5">
          <main class="container">
            <p class="text-end fw-bold">¿Querías hacer otra cosa?<a href="../views/create_share.php" class="link-light fst-italic text-decoration-none"> ¡Vuelve a tus recetas!</a></p>
            <div>
              <h1><i class="bi bi-file-earmark-richtext-fill"></i> <?php echo $registro['nombre_receta']; ?></h1>
              <p class="fw-bold fst-italic">Por: <i class="bi bi-person-fill"></i> <?php echo $registro_usuario['usuario_usuario']; ?></p>
            </div>
            <div class="py-2">
              <h2><i class="bi bi-list-check"></i> Ingredientes</h2>
              <p><?php echo $registro['ingredientes_receta']; ?></p><hr>
              <?php

                if($registro['utensilios_receta'] != ""){?>
                  <h2><i class="bi bi-list-check"></i> Utensilios</h2>
                  <p><?php echo $registro['utensilios_receta']; ?></p><hr><?php
                }

              ?>
              <h2><i class="bi bi-list-ol"></i> Preparación</h2>
              <p><?php echo $registro['proceso_receta']; ?></p><hr>
              <?php

                if($registro['extras_receta'] != ""){?>
                  <h2><i class="bi bi-list-ul"></i> Extras</h2>
                  <p><?php echo $registro['extras_receta']; ?></p><hr><?php
                }

              ?>
              <div class="py-2">
                <h2><i class="bi bi-card-image"></i> Imagen(es) de la receta</h2>
                  <div class="row pb-3">
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                      <img src="../img/upload/<?php echo $registro['foto1_receta']; ?>" class="img-thumbnail" alt=""><br>
                    </div>
                    <?php
                    
                      if($registro['foto2_receta'] != ""){?>
                        <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                          <img src="../img/upload/<?php echo $registro['foto2_receta']; ?>" class="img-thumbnail" alt=""><br>
                        </div><?php
                      }
                      if($registro['foto3_receta'] != ""){?>
                        <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                          <img src="../img/upload/<?php echo $registro['foto3_receta']; ?>" class="img-thumbnail" alt=""><br>
                        </div><?php
                      }

                    ?>
                  </div>
                <?php

                  if($registro['vídeo_receta'] != ""){?>
                    <h2><i class="bi bi-camera-video-fill"></i> Enlace de vídeo</h2>
                    <div class="ratio ratio-16x9 border border-light border-3 rounded">
                      <?php echo $registro['vídeo_receta']; ?>
                    </div><?php
                  }
                
                ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12 col-lg-4">
                <div class="container-fluid">
                  <h3 class="text-center">Calificar</h3>
                  <form action="" method="POST">
                    <?php
                    
                    if($calificada != false){?>
                      <select class="form-select mb-2" name="calificación" id="campo-calificación" disabled>
                        <option disabled>¿Cuántas estrellas le das a esta receta?</option>
                        <option <?php if($calificada == 1) { echo "selected disabled"; } ?>>1 estrellas</option>
                        <option <?php if($calificada == 2) { echo "selected disabled"; } ?>>2 estrellas</option>
                        <option <?php if($calificada == 3) { echo "selected disabled"; } ?>>3 estrellas</option>
                        <option <?php if($calificada == 4) { echo "selected disabled"; } ?>>4 estrellas</option>
                        <option <?php if($calificada == 5) { echo "selected disabled"; } ?>>5 estrellas</option>
                      </select>
                      <button class="btn gris-600 text-light w-100" type="submit" disabled><i class="bi bi-star-half"></i> Calificar</button><?php
                    }else{?>
                      <select class="form-select mb-2" name="calificación" id="campo-calificación">
                        <option selected disabled>¿Cómo calificarías a esta receta?</option>
                        <option value="1">1 estrellas</option>
                        <option value="2">2 estrellas</option>
                        <option value="3">3 estrellas</option>
                        <option value="4">4 estrellas</option>
                        <option value="5">5 estrellas</option>
                      </select>
                      <button class="btn gris-600 text-light w-100" name="" type="submit"><i class="bi bi-star-half"></i> Calificar</button>
                      <input type="text" name="calificar" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible"><?php
                    }
                    
                    ?>
                  </form>
                </div>
              </div>
              <div class="col-12 col-lg-4">
                <div class="container-fluid">
                  <h3 class="text-center">Guardar en...</h3>
                  <?php
                  
                    if($favorito == false){?>
                      <form action="" method="POST">
                        <button class="btn gris-600 text-light w-100 mb-2" type="submit"><i class="bi bi-heart"></i> Favoritos</button>
                        <input type="text" name="favorito-sí" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
                      </form><?php
                    }else{?>
                      <form action="" method="POST">
                        <button class="btn gris-600 text-light w-100 mb-2" type="submit"><i class="bi bi-heart-fill"></i> Quitar de favoritos</button>
                        <input type="text" name="favorito-no" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
                      </form><?php
                    }

                    if($guardada == false){?>
                      <form action="" method="POST">
                        <button class="btn gris-600 text-light w-100 mb-2" type="submit"><i class="bi bi-archive"></i> Para ver después</button>
                        <input type="text" name="guardar-sí" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
                      </form><?php
                    }else{?>
                      <form action="" method="POST">
                        <button class="btn gris-600 text-light w-100 mb-2" type="submit"><i class="bi bi-archive-fill"></i> Quitar de para ver después</button>
                        <input type="text" name="guardar-no" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
                      </form><?php
                    }

                  ?>
                </div>
              </div>
              <div class="col-12 col-lg-4">
                <div class="container-fluid">
                  <h3 class="text-center">¿Ya probaste esta receta?</h3>
                  <?php
                  
                    if($realizada != false){?>
                      <form action="" method="POST">
                        <button class="btn gris-600 text-light w-100" type="submit" disabled><i class="bi bi-file-check-fill"></i> Realizada</button>
                      </form><?php
                    }else{?>
                      <form action="" method="POST">
                        <button class="btn gris-600 text-light w-100" type="submit"><i class="bi bi-file-check-fill"></i> Marcar como realizada</button>
                        <input type="text" name="realizar" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
                      </form><?php
                    }
                  
                  ?>
                </div>
              </div>
            </div>
          </main>
        </div>
        
        
        <div class="verde-azul-800 text-light py-5">
          <div class="container">
            <h2>Sección de comentarios</h2>
            <div class="container-fluid py-2">
              <form action="" method="POST">
                <label class="form-label" for="campo-comentario">Realiza un comentario, evita usar términos vulgares y/u obscenos...</label>
                <textarea class="form-control mb-2" name="comentario" id="campo-comentario" cols="30" rows="5" required></textarea>
                <button class="btn verde-azul-600 text-light w-100" type="submit"><i class="bi bi-chat-right-dots-fill"></i> Comentar</button>
                <input type="text" name="comentar" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
              </form>
            </div>
            <?php
            
              $consulta_comentario = "SELECT * FROM comentar WHERE código_receta = $código";
              $resultado_comentario = $this -> Conexión() -> query($consulta_comentario);

              if($resultado_comentario -> num_rows > 0){
                while($registro_comentario = $resultado_comentario -> fetch_assoc()){
                  
                  $consulta_usuario_comentario = "SELECT * FROM usuario, comentar WHERE comentar.id_usuario = usuario.id_usuario AND usuario.id_usuario = {$registro_comentario['id_usuario']}";
                  $resultado_usuario_comentario = $this -> Conexión() -> query($consulta_usuario_comentario);

                  if($resultado_usuario_comentario -> num_rows > 0){
                    $registro_usuario_comentario = $resultado_usuario_comentario -> fetch_assoc();?>

                    <div class=" container-fluid verde-azul-800 my-3 py-2 border border-light rounded">
                      <h4><?php echo $registro_usuario_comentario['usuario_usuario']; ?></h4>
                      <p><?php echo $registro_comentario['comentario_comentar']; ?></p>
                    </div><?php
                  }
                }
              }
            
            ?>
          </div>
        </div><?php
      }
    }

    public function eliminarReceta($código){
      $consulta = "DELETE FROM receta WHERE código_receta = $código";
      if($this -> Conexión() -> query($consulta)){
        include_once("../views/create_share.php");
      }
    }

    public function calificarReceta($usuario, $código, $calificación){
      $consulta = "INSERT INTO calificar VALUES($usuario, $código, $calificación, NOW())";
      if($this -> Conexión() -> query($consulta)){
        include_once("../views/create_share.php");
      }
    }

    public function marcarFavorita($usuario, $código){
      $consulta = "INSERT INTO reaccionar VALUES($usuario, $código, NOW())";
      if($this -> Conexión() -> query($consulta)){
        include_once("../views/create_share.php");
      }
    }
    public function desmarcarFavorita($usuario, $código){
      $consulta = "DELETE FROM reaccionar WHERE id_usuario = $usuario AND código_receta = $código";
      if($this -> Conexión() -> query($consulta)){
        include_once("../views/create_share.php");
      }
    }
    
    public function guardarReceta($usuario, $código){
      $consulta = "INSERT INTO guardar VALUES($usuario, $código, NOW())";
      if($this -> Conexión() -> query($consulta)){
        include_once("../views/create_share.php");
      }
    }
    public function noGuardarReceta($usuario, $código){
      $consulta = "DELETE FROM guardar WHERE id_usuario = $usuario AND código_receta = $código";
      if($this -> Conexión() -> query($consulta)){
        include_once("../views/create_share.php");
      }
    }

    public function realizarReceta($usuario, $código){
      $consulta = "INSERT INTO realizar VALUES($usuario, $código, NOW())";
      if($this -> Conexión() -> query($consulta)){
        include_once("../views/create_share.php");
      }
    }

    public function comentarReceta($usuario, $código, $comentario){
      $consulta = "INSERT INTO comentar VALUES($usuario, $código, '$comentario', NOW())";
      if($this -> Conexión() -> query($consulta)){}
        include_once("../views/create_share.php");
    }
  }

?>