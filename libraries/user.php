<?php

  include_once("database_connection.php");

  class Usuario extends BaseDeDatos{

    private $campo_id, $campo_usuario, $campo_tipo;
    
    public function comprobarUsario($usuario, $contraseña){
      $contraseña_encriptada = hash('sha512', $contraseña);

      $consulta = "SELECT * FROM usuario WHERE usuario_usuario = '$usuario' and contrasena_usuario = '$contraseña_encriptada'";
      $resultado = $this -> Conexión() -> query($consulta); 

      if($resultado -> num_rows === 1){
        return true;
      }else{
        return false;
      }
    }

    public function establecerUsuario($usuario){

      $consulta = "SELECT * FROM usuario WHERE usuario_usuario = '$usuario'";
      $resultado = $this -> Conexión() -> query($consulta);

      if($resultado -> num_rows === 1){

        $devolución = $resultado -> fetch_assoc();
        $this -> campo_id = $devolución['id_usuario'];
        $this -> campo_usuario = $devolución['usuario_usuario'];
        $this -> campo_tipo = $devolución['tipo_usuario'];
      }
    }

    public function obtenerUsuario(){
      
      return $this -> campo_usuario;
    }

    public function obtenerId(){
      return $this -> campo_id;
    }

    public function obtenerTipo(){
      return $this -> campo_tipo;
    }
  }

?>