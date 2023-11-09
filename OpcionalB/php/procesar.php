<?php

if (!empty($_POST['dni']) && !empty($_POST['monto'])) {
  date_default_timezone_set('America/Argentina/Buenos_Aires');


  $dni = $_POST['dni'];
  $monto = $_POST['monto'];
  $fechaActual = date('d-m-Y H:i:s');
  $datosPrestamo = [
    $dni,
    $monto,
    $fechaActual
  ];

  $carpeta = '../txt/';
  if (!file_exists($carpeta)) {
    mkdir($carpeta);
  }

  $registroPrestamo = implode(';', $datosPrestamo);
  $archivoPrestamos = 'prestamos.txt';

  $juegos = fopen($carpeta . $archivoPrestamos, 'a');
  fputs($juegos, $registroPrestamo . PHP_EOL);
  fclose($juegos);


?>
  <main>
    <h1>Prestamo solicitado!</h1>
  </main>
<?php
} else {
  echo "<h1>Faltan datos</h1>";
}
?>