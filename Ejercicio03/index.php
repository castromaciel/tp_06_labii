<?php
const PRECIO_HORA = 4000;

$rutaEstilos = './css';
$rutaBootstrap = '..';

require('./php/encabezado.php');
require('./php/funciones.php');

$archivo = fopen('../horas.txt', 'r');
$precioTotal = 0;

?>

<main class="mt-4">
	<ul class="list-group">
		<?php
			while (!feof($archivo)) {
				$linea = fgets($archivo);
		
				if ($linea != '') {
					$detalleFactura = explode(';', $linea);
		
					$tareaRealizada = $detalleFactura[0];
		
					$fechaTarea = date("d/m/Y", strtotime($detalleFactura[1]));
		
					$horaInicio = strtotime($detalleFactura[2]);
					$horaFin = strtotime($detalleFactura[3]);
		
					$hsTotales = round(($horaFin - $horaInicio) / 3600);
		
					$precio = $hsTotales * PRECIO_HORA;
					$precioTotal += $precio;
					
					$precioFormateado = formatearMonto($precio);
		
					crearItemFactura($tareaRealizada, $fechaTarea, $precioFormateado, $hsTotales);
				}
			}
		?>
	</ul>
	<section class="border border-danger p-3 d-flex flex-column align-items-center">
			<strong>TOTAL:</strong>
			<?php 
				$precioTotalFormateado = formatearMonto($precioTotal);
				echo '<p>'. $precioTotalFormateado  .'</p>';
			?>
	</section>
</main>

<footer class="d-flex flex-column align-items-center bg-dark">
	<p class="text-white">Copyright 2023 - Castro Maciel Leandro Ramon</p>
</footer>
<?php
require('./php/pie.php');
?>