<?php
$rutaEstilos = './css';
$rutaBootstrap = '..';
require('./php/encabezado.php');
require('./php/funciones.php');

?>

<main class="container">
  <header>
    <h1 class="display-4 text-body-secondary">
      Archivo LOG de inicio de sesión
    </h1>
  </header>
  <table class="table table-striped text-center">
    <thead class="table-primary">
      <th>Usuario</th>
      <th>Fecha</th>
      <th>Hora</th>
    </thead>
    <tbody>
      <?php
      crearCuerpoDeTablaPorArchivo('../Ejercicio01/logs/logs.txt')
      ?>
    </tbody>
  </table>
</main>


<?php
require('./php/pie.php');

?>