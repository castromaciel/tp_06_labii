<?php
$rutaBootstrap = '../..';
require('./encabezado.php');

if (!empty($_FILES['portada']['size']) && !empty($_POST['titulo']) && !empty($_POST['jugadores']) && !empty($_POST['lanzamiento']) && !empty($_POST['genero'])) {

  $campoTitulo = $_POST['titulo'];
  $campoJugadores = $_POST['jugadores'];
  $campoLanzamiento = $_POST['lanzamiento'];
  $campoGenero = $_POST['genero'];

  $campoImagen = $_FILES['portada'];

  $datosJuegoCreado = [
    $campoTitulo,
    $campoJugadores,
    $campoLanzamiento,
    $campoGenero,
  ];

  // Gurdar juego en txt/
  $carpetaJuegos = '../txt/';
  if (!file_exists($carpetaJuegos)) {
    mkdir($carpetaJuegos);
  }

  $registro = implode(';', $datosJuegoCreado);

  $archivoJuegos = 'juegos.txt';
  $juegos = fopen($carpetaJuegos . $archivoJuegos, 'a');
  fputs($juegos, $registro . PHP_EOL);
  fclose($juegos);

  // Gurdar portada en img/portadas/
  $carpetaPortadas = '../img/portadas/';
  if (!file_exists($carpetaPortadas)) {
    mkdir($carpetaPortadas);
  }

  $tituloJuego = explode(' ', $campoTitulo);

  $tituloJuego = implode('', $tituloJuego);


  $origenImagen = $campoImagen['tmp_name'];
  $destinoImagen = $carpetaPortadas . $tituloJuego . '.jpg';

  $archivoCargado = move_uploaded_file($origenImagen, $destinoImagen);

  if ($archivoCargado) {

?>

    <main>
      <h1>Juego guardado exitosamente!</h1>
      <p>Regresando...</p>
      <?php header('refresh:3; url=../index.php'); ?>
    </main>

<?php
  } else {
    echo '<h1>Falla a guardar</h1>';
  }
} else {
  echo '<h1>Faltan datos</h1>';
}

?>