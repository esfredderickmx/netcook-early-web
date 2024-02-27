<?php

  include_once("database_connection.php");

  class RecetasInicio extends BaseDeDatos{

    public function filtroBCO($búsqueda, $categoría, $orden){

      $consulta = "SELECT * FROM receta, categoría, categorizar WHERE receta.código_receta = categorizar.código_receta AND categorizar.id_categoría = categoría.id_categoría AND receta.nombre_receta LIKE '$búsqueda%' AND categoría.id_categoría = $categoría ORDER BY receta.nombre_receta $orden";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){
          
          $consulta_usuario = "SELECT * FROM usuario WHERE id_usuario = '{$registro['id_usuario']}'";
          $resultado_usuario = $this -> Conexión() -> query($consulta_usuario);

          if($resultado_usuario -> num_rows === 1){
            $registro_usario = $resultado_usuario -> fetch_assoc();
            $usuario_usuario = $registro_usario['usuario_usuario'];
          }?>

          <div class="col-12 col-lg-6">
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
                </div>
              </div>
              <div class="card-footer text-muted">
                <i class="bi bi-person-fill"></i> <?php echo $usuario_usuario; ?>
              </div>
            </div>
          </div><?php
        }
      }
    }

    public function filtroBC($búsqueda, $categoría){
      $consulta = "SELECT * FROM receta, categoría, categorizar WHERE receta.código_receta = categorizar.código_receta AND categorizar.id_categoría = categoría.id_categoría AND receta.nombre_receta LIKE '$búsqueda%' AND categoría.id_categoría = $categoría";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){
          
          $consulta_usuario = "SELECT * FROM usuario WHERE id_usuario = '{$registro['id_usuario']}'";
          $resultado_usuario = $this -> Conexión() -> query($consulta_usuario);

          if($resultado_usuario -> num_rows === 1){
            $registro_usario = $resultado_usuario -> fetch_assoc();
            $usuario_usuario = $registro_usario['usuario_usuario'];
          }?>

          <div class="col-12 col-lg-6">
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
                </div>
              </div>
              <div class="card-footer text-muted">
                <i class="bi bi-person-fill"></i> <?php echo $usuario_usuario; ?>
              </div>
            </div>
          </div><?php
        }
      }
    }
    
    public function filtroBO($búsqueda, $orden){
      $consulta = "SELECT * FROM receta WHERE nombre_receta LIKE '$búsqueda%' ORDER BY nombre_receta $orden";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){
          
          $consulta_usuario = "SELECT * FROM usuario WHERE id_usuario = '{$registro['id_usuario']}'";
          $resultado_usuario = $this -> Conexión() -> query($consulta_usuario);

          if($resultado_usuario -> num_rows === 1){
            $registro_usario = $resultado_usuario -> fetch_assoc();
            $usuario_usuario = $registro_usario['usuario_usuario'];
          }?>

          <div class="col-12 col-lg-6">
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
                </div>
              </div>
              <div class="card-footer text-muted">
                <i class="bi bi-person-fill"></i> <?php echo $usuario_usuario; ?>
              </div>
            </div>
          </div><?php
        }
      }
      
    }

    public function filtroB($búsqueda){
      $consulta = "SELECT * FROM receta WHERE nombre_receta LIKE '$búsqueda%'";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){
          
          $consulta_usuario = "SELECT * FROM usuario WHERE id_usuario = '{$registro['id_usuario']}'";
          $resultado_usuario = $this -> Conexión() -> query($consulta_usuario);

          if($resultado_usuario -> num_rows === 1){
            $registro_usario = $resultado_usuario -> fetch_assoc();
            $usuario_usuario = $registro_usario['usuario_usuario'];
          }?>

          <div class="col-12 col-lg-6">
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
                </div>
              </div>
              <div class="card-footer text-muted">
                <i class="bi bi-person-fill"></i> <?php echo $usuario_usuario; ?>
              </div>
            </div>
          </div><?php
        }
      }
    }

    public function mostrarRecetas(){
      
      $consulta = "SELECT * FROM receta";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){
          
          $consulta_usuario = "SELECT * FROM usuario WHERE id_usuario = '{$registro['id_usuario']}'";
          $resultado_usuario = $this -> Conexión() -> query($consulta_usuario);

          if($resultado_usuario -> num_rows === 1){
            $registro_usario = $resultado_usuario -> fetch_assoc();
            $usuario_usuario = $registro_usario['usuario_usuario'];
          }?>

          <div class="col-12 col-lg-6">
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
                </div>
              </div>
              <div class="card-footer text-muted">
                <i class="bi bi-person-fill"></i> <?php echo $usuario_usuario; ?>
              </div>
            </div>
          </div><?php
        }
      }else{?>
        <div class="col-12 col-lg-6">
          <div class="card my-3">
            <img src="../img/image-cap.jpg" class="card-img-top img-fluid" alt="nombre de la receta">
            <div class="card-body">
              <h4 class="card-title">De esta forma</h4>
              <p class="card-text">Se mostrarán las recetas y los resultados de búsqueda en general, en caso haberlos...</p>
              <div>
                <form action="" method="POST">
                  <button type="submit" class="btn naranja-600 text-light mb-2"><i class="bi bi-eye-fill"></i> Ver receta</button>
                </form>
              </div>
            </div>
            <div class="card-footer text-muted">
              <i class="bi bi-person-fill"></i> Usuario
            </div>
          </div>
        </div><?php
      }
    }

    public function mostrarFavoritos($usuario){
      $consulta = "SELECT * FROM reaccionar WHERE id_usuario = $usuario";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){
          $consulta_receta = "SELECT * FROM receta WHERE código_receta = {$registro['código_receta']}";
          $resultado_receta = $this -> Conexión() -> query($consulta_receta);

          if($resultado_receta -> num_rows === 1){
            $registro_receta = $resultado_receta -> fetch_assoc();
          }?>

          
          <form action="" method="POST">
            <li class="list-group-item">
              <button class="btn text-start" type="submit"><?php echo $registro_receta['nombre_receta']; ?></button>
              <input type="text" name="ver" id="campo-código" value="<?php echo $registro_receta['código_receta']; ?>" class="invisible">
            </li>
          </form><?php
        }
      }
    }

    public function mostrarGuardados($usuario){
      $consulta = "SELECT * FROM guardar WHERE id_usuario = $usuario";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){
          $consulta_receta = "SELECT * FROM receta WHERE código_receta = {$registro['código_receta']}";
          $resultado_receta = $this -> Conexión() -> query($consulta_receta);

          if($resultado_receta -> num_rows === 1){
            $registro_receta = $resultado_receta -> fetch_assoc();
          }?>

          
          <form action="" method="POST">
            <li class="list-group-item">
              <button class="btn text-start" type="submit"><?php echo $registro_receta['nombre_receta']; ?></button>
              <input type="text" name="ver" id="campo-código" value="<?php echo $registro_receta['código_receta']; ?>" class="invisible">
            </li>
          </form><?php
        }
      }
    }
    
    public function mostrarRanking(){
      $consulta = "SELECT * FROM receta, aparecer WHERE receta.código_receta = aparecer.código_receta";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows > 0){
        while($registro = $resultado -> fetch_assoc()){?>
          
          <form action="" method="POST">
            <li class="list-group-item">
              <button class="btn text-start" type="submit"><?php echo $registro['nombre_receta']; ?></button>
              <input type="text" name="ver" id="campo-código" value="<?php echo $registro['código_receta']; ?>" class="invisible">
            </li>
          </form><?php
        }
      }
    }

    public function calcularRanking(){
      $consulta_reinicio = "TRUNCATE TABLE aparecer";
      if($this -> Conexión() -> query($consulta_reinicio)){

        $consulta_nuevo = "INSERT INTO ranking(fecha_ranking) VALUES(NOW())";
        if($this -> Conexión() -> query($consulta_nuevo)){
          $consulta_ranking = "SELECT * FROM ranking ORDER BY id_ranking DESC";
          $resultado_ranking = $this -> Conexión() -> query($consulta_ranking);

          if($resultado_ranking -> num_rows >= 1){
            $registro_ranking = $resultado_ranking -> fetch_assoc();
          }

          $consulta_obtener = "SELECT * FROM cálculo_ranking";
          $resultado_obtener = $this -> Conexión() -> query($consulta_obtener);

          if($resultado_obtener -> num_rows > 0){
            while($registro_obtener = $resultado_obtener -> fetch_assoc()){
              $consulta_generar = "INSERT INTO aparecer VALUES({$registro_obtener['código_receta']}, {$registro_ranking['id_ranking']})";
              $this -> Conexión() -> query($consulta_generar);
            }
          }
        }
      }
    }
  }

  include_once("../views/home.php");

?>