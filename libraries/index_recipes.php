<?php

  include_once("database_connection.php");

  class RecetasÍndice extends BaseDeDatos{
    
    public function mostrarRecetas(){
      
      $consulta = "SELECT * FROM receta ORDER BY publicación_receta DESC LIMIT 4";
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
              <img src="img/upload/<?php echo $registro['foto1_receta']; ?>" class="card-img-top img-fluid" alt="nombre de la receta">
              <div class="card-body">
                <h4 class="card-title"><?php echo $registro['nombre_receta']; ?></h4>
                <p class="card-text"><?php echo $registro['corte_receta']; ?>...</p>
                <div>
                  <a href="views/sign-in.php" class="btn naranja-600 text-light mb-2"><i class="bi bi-pen-fill"></i> Registrarse ahora</a>
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
  }

?>