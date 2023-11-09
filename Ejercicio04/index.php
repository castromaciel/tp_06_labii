<?php
$rutaBootstrap = '..';

require('./php/encabezado.php');

?>

<main class="bg-body-tertiary border col-6 mx-auto">
  <header class="bg-warning">
    <h1 class="display-6 py-2 text-center">Nuevo Juego</h1>
  </header>

  <form action="./php/procesar.php" method="POST" class="px-3" enctype="multipart/form-data">
    <section class="mb-3">
      <label for="titulo" class="form-label">Titulo</label>
      <input type="text" class="form-control" id="titulo" name="titulo" required maxlength="100" minlength="1">
    </section>

    <section class="mb-3">
      <label for="jugadores" class="form-label">Jugadores</label>
      <input type="number" class="form-control" id="jugadores" name="jugadores" max="10" min="1" required>
    </section>

    <section class="mb-3">
      <label for="lanzamiento" class="form-label">Lanzamiento</label>
      <input type="date" class="form-control" id="lanzamiento" name="lanzamiento" min='2000-01-01' max='2023-11-11' required>
    </section>

    <section class="mb-3">
      <label class="form-label" for="genero">Genero</label>
      <select class="form-select" name="genero" id="genero">
        <option selected value="accion">Acción</option>
        <option value="deporte">Deportes</option>
        <option value="disparos">Disparos</option>
        <option value="rol">Rol</option>
      </select>
    </section>


    <section class="mb-3">
      <label for="portada" class="form-label">Portada</label>
      <input class="form-control" type="file" id="portada" name='portada' accept="image/png" required/>
    </section>

    <section class="mb-3 d-flex justify-content-center">
      <input type="submit" class="btn btn-success" value="Guardar" />
    </section>
  </form>

</main>

<?php
require('./php/footer.php');
?>