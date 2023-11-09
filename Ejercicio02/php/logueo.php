<?php
$rutaEstilos = '../css';
require_once('../php/encabezado.php');
include('../php/funciones.php');

if (!empty($_POST['usuario'] && !empty($_POST['contrasenia']))) {

  $usuarios = fopen('../../usuarios.txt', 'r');

  $usuarioIngresado = trim($_POST['usuario']);
  $contraseniaIngresada = trim($_POST['contrasenia']);

  $accesoPermitido = false;

  while (!feof($usuarios) && !$accesoPermitido) {
    $linea = fgets($usuarios);

    if ($linea != '') {
      $usuarioClave = explode(';', $linea);

      $usuario = trim($usuarioClave[0]);
      $contrasenia = trim($usuarioClave[1]);

      if (
        $usuarioIngresado === $usuario
        && $contraseniaIngresada === $contrasenia
      ) {
        $accesoPermitido = true;

        crearRegistroDeLogin($usuario);

        header('refresh: 0; url=./listado.php?usuario='. $usuarioIngresado);
      }
    }
  }
  
  fclose($usuarios);
  if (!$accesoPermitido) {
    echo "<section>";
    echo "<h1 class='text-white'>Datos incorrectos</h1>";
    echo "<h2 class='text-white'>Regresando...</h2>";
    header('refresh: 3; url=../index.php');
    echo "</section>";
  }
  
} else {
  echo "<h1 class='text-white'>Para visualizar esta información, debe iniciar sesión</h1>";
}
?>
