<?php
$rutaEstilos = './css';
require_once("./php/encabezado.php");

?>

<main class="container d-flex align-items-center justify-content-center text-white">

  <form class="bg-black col-6 d-flex flex-column align-items-center justify-content-center p-4 gap-3 border border-light-subtle rounded shadow" action="./php/logueo.php" method="POST">
    <header>
      <h3>INICIAR SESIÓN</h3>
      <p class="text-secondary">Ingrese su mail y contraseña</p>
    </header>

    <section>
      <input type="usuario" id="usuario" name="usuario" class="form-control" required />
      <label for="usuario">Usuario</label>
    </section>

    <section>
      <input type="password" id="contrasenia" name="contrasenia" class="form-control" required />
      <label for="contrasenia">Contraseña</label>
    </section>

    <input type="submit" value="Login" class="btn btn-outline-light" />
  </form>
</main>

<?php
require_once("./php/pie.php");
?>