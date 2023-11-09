<?php
$rutaEstilos = '../css';
$rutaBootstrap = '../..';
$rutaImagen = '../..';

require('./encabezado.php');
require('./navbar.php');

if (!empty($_POST['dni'])) {
  date_default_timezone_set('America/Argentina/Buenos_Aires');

  $dniIngresado = $_POST['dni'];

  $fechaYHoraImpresion = explode(' ', date('d/m/Y H:i:s'));
  $fechaImpresion = $fechaYHoraImpresion[0];
  $horaImpresion = $fechaYHoraImpresion[1];


  $archivo = fopen('../../alumnos.txt', 'r');
  $existeAlmuno = false;
  while(!feof($archivo) && !$existeAlmuno) {
    $linea = fgets($archivo);

    if ($linea != '') {
      $alumno = explode(';', $linea);
      $dniAlumno = trim($alumno[0]);
      
      if ($dniAlumno == $dniIngresado) {
        $apellidoYNombre = $alumno[1];
        $carrera = $alumno[2];
        $existeAlmuno = true;
      }
    }
  }
  fclose($archivo);

  if ($existeAlmuno) {

?>

  <main class="container">
    <section class="mt-3 mx-5 px-5">
      <h2>Constancia de alumno regular</h2>

      <article class="mx-5">
        <p class="text-end">
          <strong>
            Fecha y hora de impresión:
            <?php echo $fechaImpresion . ' - ' . $horaImpresion; ?>
          </strong>
        </p>

        <p>
          Por la presente se deja constancia que el/la alumna
          <strong>
            <?php echo $apellidoYNombre; ?>,
          </strong>
          DNI:
          <strong>
            <?php echo $dniIngresado ;?>
          </strong>
          es alumno/a regular de la carrera
          <strong>
            <?php echo $carrera; ?>
          </strong>.
        </p>

        <p>
          Las autoridades de la Facultad de Ciencias Exactas y Tecnología expiden la siguiente constancia para ser presentado donde corresponda.
        </p>
      </article>
    </section>
  </main>


<?php
  } else {
    echo '<h1>Alumno no encontrado</h1>';
  }
} else {
  echo '<h1>Debe ingresar su DNI!</h1>';
}

require('./footer.php');

?>