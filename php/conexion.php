<?php
  $servidor = "localhost";
  $usuario = "root";
  $contrasenia = "mysql";
  $bd = "gamemagiv";

  #conectando al servidor mysql y a la bd
  $cn = mysqli_connect($servidor,$usuario,$contrasenia,$bd);

  #verificando conexion
  if(!$cn){
    echo "problemas al conectar con el servidor ";
  }
  //mysqli_query($cn,"SET NAMES=utf8");
  mysqli_set_charset($cn,"utf8");//lee caracteres especiales 
?>