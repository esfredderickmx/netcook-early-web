<?php

  include_once("database_connection.php");

  class Receta extends BaseDeDatos{

    public function crearReceta($usuario, $nombre, $ingredientes, $utensilios, $proceso, $extras, $categoría1, $categoría2, $categoría3, $categoría4, $foto1, $temporal1, $foto2, $temporal2, $foto3, $temporal3, $url){

      $consulta_usuario = "SELECT * FROM usuario WHERE usuario_usuario = '$usuario'";
      $resultado_usuario = $this -> Conexión() -> query($consulta_usuario);

      if($resultado_usuario -> num_rows === 1){
        $registro_usuario = $resultado_usuario -> fetch_assoc();
        $id_usuario = $registro_usuario['id_usuario'];
      }
      
      $consulta_añadir_receta = "INSERT INTO receta(id_usuario, publicación_receta, nombre_receta, ingredientes_receta, utensilios_receta, proceso_receta, extras_receta, vídeo_receta, corte_receta) VALUES($id_usuario, NOW(), '$nombre', '$ingredientes', '$utensilios', '$proceso', '$extras', '$url', '$proceso')";

      if($this -> Conexión() -> query($consulta_añadir_receta)){
        
        $consulta_receta = "SELECT * FROM receta WHERE id_usuario = '$id_usuario' ORDER BY publicación_receta DESC";
        $resultado_receta = $this -> Conexión() -> query($consulta_receta);

        if($resultado_receta -> num_rows > 0){
          $registro_receta = $resultado_receta -> fetch_assoc();
          $código_receta = $registro_receta['código_receta'];
        }

        $foto1 = "1-$código_receta.jpg";
        $foto1_almacenar = "../img/upload/".$foto1;
        move_uploaded_file($temporal1, $foto1_almacenar);
        $consulta_foto1 = "UPDATE receta SET foto1_receta = '$foto1' WHERE código_receta = $código_receta";
        $resultado_foto1 = $this -> Conexión() -> query($consulta_foto1);

        if($foto2 != ""){

          $foto2 = "2-$código_receta.jpg";
          $foto2_almacenar = "../img/upload/".$foto2;
          move_uploaded_file($temporal2, $foto2_almacenar);
          $consulta_foto2 = "UPDATE receta SET foto2_receta = '$foto2' WHERE código_receta = $código_receta";
          $resultado_foto2 = $this -> Conexión() -> query($consulta_foto2);
        }

        if($foto3 != ""){
          
          $foto3 = "3-$código_receta.jpg";
          $foto3_almacenar = "../img/upload/".$foto3;
          move_uploaded_file($temporal3, $foto3_almacenar);
          $consulta_foto3 = "UPDATE receta SET foto3_receta = '$foto3' WHERE código_receta = $código_receta";
          $resultado_foto3 = $this -> Conexión() -> query($consulta_foto3);
        }

        $consulta_añadir_categorizar = "INSERT INTO categorizar VALUES($código_receta, $categoría1)";
        $resultado_añadir_categorizar = $this -> Conexión() -> query($consulta_añadir_categorizar);

        if($categoría2 != ""){
          $consulta_añadir_categorizar2 = "INSERT INTO categorizar VALUES($código_receta, $categoría2)";
          $resultado_añadir_categorizar2 = $this -> Conexión() -> query($consulta_añadir_categorizar2);
        }
        
        if($categoría3 != ""){
          $consulta_añadir_categorizar3 = "INSERT INTO categorizar VALUES($código_receta, $categoría3)";
          $resultado_añadir_categorizar3 = $this -> Conexión() -> query($consulta_añadir_categorizar3);
        }
        
        if($categoría4 != ""){
          $consulta_añadir_categorizar4 = "INSERT INTO categorizar VALUES($código_receta, $categoría4)";
          $resultado_añadir_categorizar4 = $this -> Conexión() -> query($consulta_añadir_categorizar4);
        }

        header("location: ../views/create_share.php");
      }
    }
  }

  $receta = new Receta;

  if(isset($_POST['crear'])){
    
    include_once("../libraries/user.php");
    include_once("../libraries/user_session.php");

    $sesión = new Sesión();
    $usuario = new Usuario();

    if(isset($_SESSION['usuario'])){
      $usuario -> establecerUsuario($sesión -> obtenerActual());
    }
    
    $nombreFormulario = $_POST['nombre'];
    $ingredienteFormulario = $_POST['ingredientes'];
    $utensiliosFormulario = $_POST['utensilios'];
    $procesoFormulario = $_POST['proceso'];
    $extrasFormulario = $_POST['extras'];
    $categoría1Formulario = $_POST['categoría1'];
    $categoría2Formulario = $_POST['categoría2'];
    $categoría3Formulario = $_POST['categoría3'];
    $categoría4Formulario = $_POST['categoría4'];
    $urlFormulario = $_POST['url'];
    
    $foto1Formulario = $_FILES['foto1']['name'];
    $foto1_tipo = $_FILES['foto1']['type'];
    $foto1_tamaño = $_FILES['foto1']['size'];
    $foto1_temporal = $_FILES['foto1']['tmp_name'];
    $foto2Formulario = $_FILES['foto2']['name'];
    $foto2_tipo = $_FILES['foto2']['type'];
    $foto2_tamaño = $_FILES['foto2']['size'];
    $foto2_temporal = $_FILES['foto2']['tmp_name'];
    $foto3Formulario = $_FILES['foto3']['name'];
    $foto3_tipo = $_FILES['foto3']['type'];
    $foto3_tamaño = $_FILES['foto3']['size'];
    $foto3_temporal = $_FILES['foto3']['tmp_name'];

    $receta -> crearReceta($usuario -> obtenerUsuario(), $nombreFormulario, $ingredienteFormulario, $utensiliosFormulario, $procesoFormulario, $extrasFormulario, $categoría1Formulario, $categoría2Formulario, $categoría3Formulario, $categoría4Formulario, $foto1Formulario, $foto1_temporal, $foto2Formulario, $foto2_temporal, $foto3Formulario, $foto3_temporal, $urlFormulario);
  }

?>