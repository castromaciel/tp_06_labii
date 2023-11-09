<?php

function crearRegistroDeLogin($usuario)
{
  $carpetaLogs = '../logs/';
  if (!file_exists($carpetaLogs)) {
    mkdir($carpetaLogs);
  }

  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $fechaHoraDeInicio = explode(' ', date('d-m-Y H:i:s'));

  // Datos de la forma [$usuario, $fecha, $hora]
  $datos = [$usuario, $fechaHoraDeInicio[0], $fechaHoraDeInicio[1]];

  $registro = implode(';', $datos);

  $archivoLogs = 'logs.txt';
  $logs = fopen($carpetaLogs . $archivoLogs, 'a');
  fputs($logs, $registro . PHP_EOL);
  fclose($logs);
}
?>