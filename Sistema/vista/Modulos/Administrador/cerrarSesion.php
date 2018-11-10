<?php
//Se obtiene la sesion iniciada actualmente
session_start();
//se destruye la sesion actual
session_destroy();
//se redirecciona al index, que viene siendo el dinces de login por eso los dos .., ya que el sistema esta dentro de otra carpeta, y no comparte la misma carpeta de nivel que el login
header('Location: ../index.php');
?>