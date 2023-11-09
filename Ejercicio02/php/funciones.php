<?php

function crearCuerpoDeTablaPorArchivo($direccion)
{
  $archivo = fopen($direccion, 'r');

  while (!feof($archivo)) {
    $registro = fgets($archivo);

    if ($registro != '') {
      $datosRegistro = explode(';', $registro);
      $usuario = $datosRegistro[0];
      $fecha = $datosRegistro[1];
      $hora = $datosRegistro[2];

      echo '<tr>';
      echo '<td>' . $usuario . '</td>';
      echo '<td>' . $fecha . '</td>';
      echo '<td>' . $hora . '</td>';
      echo '</tr>';
    }
}

fclose($archivo);

}
?>