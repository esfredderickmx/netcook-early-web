<?php

  class Correo{
    
    public function enviarCorreo($nombre, $correo, $mensaje){

      $destino = "smm.08.smm@gmail.com";
      $asunto = "Comentario de Netcook";

      $encabezado = "Correo enviado desde el proyecto de app web Netcook";
      $correo_completo = "$mensaje\nAtentamente: $nombre";

      mail($destino, $asunto, $correo_completo, $encabezado);

      $hecho = "¡Correo enviado exitósamente!";
      include_once("../views/contact.php");
    }
  }

  $correo = new Correo;

  if(isset($_POST['enviar'])){
    $nombreFormulario = $_POST['nombre'];
    $correoFormulario = $_POST['correo'];
    $mensajeFormulario = $_POST['comentario'];
  }

  $correo -> enviarCorreo($nombreFormulario, $correoFormulario, $mensajeFormulario);

?>