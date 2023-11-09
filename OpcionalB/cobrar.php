<?php
$rutaBootstrap = '..';

require('./php/encabezado.php');

?>

<main>
  <header>
    <h1>Financiera "Pagas o Cobras</h1>
  </header>

  <form action="./php/calculoDeuda.php" method="POST" class="w-25">
    <section class="mb-3">
      <label for="dni" class="form-label">DNI:</label>
      <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese su DNI">
    </section>
    
    <input type="submit" class="btn btn-danger" value="Pagar">
  </form>

</main>


<?php
require('./php/footer.php');
?>