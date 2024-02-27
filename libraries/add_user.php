<?php

  include_once("database_connection.php");

  class UsuarioNuevo extends BaseDeDatos{

    public function añadirUsuario($correo, $usuario, $contraseña, $nombre, $apellido){

      $consulta_correo = "SELECT * FROM usuario WHERE correo_usuario = '$correo'";
      $resultado_correo = $this -> Conexión() -> query($consulta_correo);

      $consulta_usuario = "SELECT * FROM usuario WHERE usuario_usuario = '$usuario'";
      $resultado_usuario = $this -> Conexión() -> query($consulta_usuario);

      if($resultado_correo -> num_rows === 1 and $resultado_usuario -> num_rows === 1){
        $error_ambos = "Ya existe una cuenta afiliada a ese correo electrónico y, además, ese nombre de usuario no está disponible actualmente, intenta con otro";
        
        include_once("../views/sign-in.php");
      }else if($resultado_correo -> num_rows === 1){
        $error_correo = "Ya existe una cuenta afiliada a ese correo electrónico";
        
        include_once("../views/sign-in.php");
      }else if($resultado_usuario -> num_rows === 1){
        $error_usuario = "Nombre de usuario no disponible actualmente, intenta con otro";

        include_once("../views/sign-in.php");
      }else{
        $contraseña_encriptada = hash('sha512', $contraseña);

        $consulta_añadir = "INSERT INTO usuario(correo_usuario, usuario_usuario, contrasena_usuario, nombre_usuario, apellido_usuario, tipo_usuario, alta_usuario) VALUES('$correo', '$usuario', '$contraseña_encriptada', '$nombre', '$apellido', 0, NOW())";
        if($this -> Conexión() -> query($consulta_añadir)){
          header("location: session_index.php");
        }
      }
    } 
  }

  $usuario_nuevo = new UsuarioNuevo();

  if(isset($_POST['registrar'])){
    $correoFormulario = $_POST['correo'];
    $usuarioFormulario = $_POST['usuario'];
    $contraseñaFormulario = $_POST['contraseña'];
    $nombreFormulario = $_POST['nombre'];
    $apellidoFormulario = $_POST['apellido'];

    $usuario_nuevo -> añadirUsuario($correoFormulario, $usuarioFormulario, $contraseñaFormulario, $nombreFormulario, $apellidoFormulario);
  }

?>