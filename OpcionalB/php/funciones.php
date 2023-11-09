<?php
function formatearMonto($monto) {
  $montoFormateado = '$' . number_format($monto, '2', ',', '.');
  return $montoFormateado;
}

function crearItemFactura($detalleTarea, $fecha, $precio, $horasTotales)
{
  echo '<li class="list-group-item d-flex justify-content-between align-items-start border-info border-1 rounded-3">';
  echo '<div class="ms-2 me-auto">';
  echo '<div class="fw-bold">' . $detalleTarea . ' - ' . $fecha . '</div>';
  echo $precio;
  echo '</div>';
  echo '<span class="badge bg-primary rounded-pill">' . $horasTotales . ' hs</span>';
  echo '</li>';
}

?>