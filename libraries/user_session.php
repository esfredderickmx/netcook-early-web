<?php

  class Sesión{
    public function __construct(){
      session_start();
    }

    public function establecerActual($usuario){
      $_SESSION['usuario'] = $usuario;
    }

    public function obtenerActual(){
      return $_SESSION['usuario'];
    }

    public function cerrarSesión(){
      session_unset();
      session_destroy();
    }
  }

?>