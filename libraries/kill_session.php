<?php

  include_once("user_session.php");

  $sesiónUsuario = new Sesión();
  $sesiónUsuario -> cerrarSesión();

  header("location: ../index.php")

?>