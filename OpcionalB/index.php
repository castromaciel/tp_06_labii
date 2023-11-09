<?php
$rutaBootstrap = '..';

require('./php/encabezado.php');

?>

<main>
  <header>
    <h1>Financiera "Pagas o Cobras</h1>
  </header>

  <form action="./php/procesar.php" method="POST" class="w-25">
    <section class="mb-3">
      <label for="dni" class="form-label">DNI:</label>
      <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su DNI">
    </section>
    
    <section class="mb-3">
      <label for="monto" class="form-label">Monto:</label>
      <input type="text" class="form-control" id="monto" name="monto" placeholder="Ingrese un monto" min="0">
    </section>

    <input type="submit" class="btn btn-success" value="Solicitar Préstamo">
  </form>

</main>


<?php
require('./php/footer.php');
?>