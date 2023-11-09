<?php
const INTERES_DIARIO = 1.5;
$rutaBootstrap = '../..';

require('./encabezado.php');
require('./funciones.php');

if (!empty($_POST['dni'])) {
  date_default_timezone_set('America/Argentina/Buenos_Aires');

  $dniIngresado = $_POST['dni'];
  $datosUsuario = [];
  $prestamos = fopen('../txt/prestamos.txt', 'r');

  $encontroDni = false;

  $fechaActual = '';
  $fechaSolicitud = '';
  $montoDelPrestamo = '';
  $cantidadDias = '';

  while (!feof($prestamos) && !$encontroDni) {
    $linea = fgets($prestamos);

    if ($linea != '') {
      $registroPrestamo = explode(';', $linea);
      $dni = trim($registroPrestamo[0]);

      if (
        $dni === $dniIngresado
      ) {
        $fechaActual = date('d-m-Y H:i:s');
        $fechaSolicitudTimestamp = date_create($registroPrestamo[2] . $registroPrestamo[3]);

        $fechaSolicitud = date_format($fechaSolicitudTimestamp,'d-m-Y H:i:s');

        $montoDelPrestamo = formatearMonto($registroPrestamo[1]);
        $cantidadDias = round((strtotime($fechaActual) - strtotime($fechaSolicitud)) / 86400);

        $montoAPagar = ($cantidadDias * (INTERES_DIARIO/100) * $registroPrestamo[1]) + $registroPrestamo[1];

        $encontroDni = true;
      }
    }
  }

  if ($encontroDni) {

?>

    <main>
      <header>
        <h1>Financiera "Pagas o Cobras"</h1>
      </header>

      <section>
        <h2>Calculo de deuda</h2>
        <p>
          Monto del préstamo
          <strong>
            <?php echo $montoDelPrestamo; ?>
          </strong>
        </p>
        <p>
          Fecha de solicitud
          <strong>
            <?php echo $fechaSolicitud ?>
          </strong>
        </p>
        <p>
          Fecha actual
          <strong>
            <?php echo $fechaActual ?>
          </strong>
        </p>
        <p>
          Cantidad de días
          <strong>
            <?php echo $cantidadDias ?>
          </strong>
        </p>
      </section>

      <footer>
        <h3 class="text-danger">
          Monto a pagar
          <?php echo formatearMonto($montoAPagar)?>
        </h3>
      </footer>
    </main>

<?php
  } else {
    echo "<h1>Dni no encontrado</h1>";
  }
} else {
  echo "<h1>Faltan datos</h1>";
}
require('./footer.php');

?>