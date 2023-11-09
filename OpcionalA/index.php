<?php
$rutaBootstrap = '..';
$rutaImagen = '..';
require('./php/encabezado.php');
require('./php/navbar.php');

?>

<main class="container">
  <section class="mt-3 mx-5 px-5">

    <h2>Constancia de alumno regular</h2>

    <form action="./php/procesar.php" method="POST" class="w-25">
      <section class="mb-3">
        <label for="dni" class="form-label">DNI:</label>
        <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su DNI">
      </section>

      <input type="submit" class="btn btn-primary" value="Imprimir">
    </form>
  </section>
</main>


<?php
require('./php/footer.php');
?>