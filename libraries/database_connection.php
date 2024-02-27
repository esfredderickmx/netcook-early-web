<?php

  class BaseDeDatos{
    private $dns_base, $usuario_base, $contraseña_base, $base, $charset_base;

    public function __construct(){
      $this -> dns_base = "localhost";
      $this -> usuario_base = "root";
      $this -> contraseña_base = "uOAK8~JvAlQZ";
      $this -> base = "netcook";
      $this -> charset_base = "utf8mb4";
    }

    public function Conexión(){
      $conexión = new mysqli($this -> dns_base, $this -> usuario_base, $this -> contraseña_base);

      if($conexión -> connect_errno){
        echo "Ha ocurrido un error al conectarse a MySQL";
        exit();
      }

      $conexión -> select_db($this -> base) or die("Ha ocurrido un error al conectarse a la base de datos: $this -> base");
      $conexión -> set_charset($this -> charset_base);

      return $conexión;
    }
  }

?>