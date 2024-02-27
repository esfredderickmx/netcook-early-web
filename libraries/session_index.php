<?php

  include_once("user.php");
  include_once("user_session.php");

  $sesión = new Sesión();
  $usuario = new Usuario();

  if(isset($_SESSION['usuario'])){
    $usuario -> establecerUsuario($sesión -> obtenerActual());

    header("location: ../views/home.php");
  }else if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
    $usuarioFormulario = $_POST['usuario'];
    $contraseñaFormulario = $_POST['contraseña'];

    if($usuario -> comprobarUsario($usuarioFormulario, $contraseñaFormulario)){
      $sesión -> establecerActual($usuarioFormulario);
      $usuario -> establecerUsuario($usuarioFormulario);

      header("location: ../views/home.php");
    }else{
      $error_acceso = "Nombre de usuario y/o contraseña incorrectos";
      include_once("../views/log-in.php");
    }
  }else{
    include_once("../views/log-in.php");
  }

?>