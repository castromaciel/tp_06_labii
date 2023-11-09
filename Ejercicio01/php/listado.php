<?php
$rutaEstilos = '../css';
require_once("./encabezado.php");

if (!empty($_GET['usuario'])) {
  $usuario = $_GET['usuario']

?>

  <section class='text-center'>
    <?php
    echo "<h1 class='text-white'>Bienvenido " . $usuario . "</h1>";
    ?>
  </section>

<?php
  require_once("./pie.php");
} else {
  echo "<h1 class='text-white'>Para visualizar esta información, debe iniciar sesión</h1>";
}
?>