<?php

  include_once("database_connection.php");

  class ComboCategorías extends BaseDeDatos{
    
    public function colocarCategorías(){
      $consulta_categorías = "SELECT * FROM categoría";
      $resultado_categorías = $this -> Conexión() -> query($consulta_categorías);

      if($resultado_categorías -> num_rows > 0){
        while($registro = $resultado_categorías -> fetch_assoc()){?>
          <option value="<?php echo $registro['id_categoría'] ?>"><?php echo $registro['nombre_categoría'] ?></option>"<?php
        }
      }
    }
  }

?>