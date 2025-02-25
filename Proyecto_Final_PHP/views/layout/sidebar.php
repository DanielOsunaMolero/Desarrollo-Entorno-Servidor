<nav>
  <ul>
    <!-- <li><a href="">Inicio</a></li>
        <li><a href="">Categoria 1</a></li>
        <li><a href="">Categoria 2</a></li>
        <li><a href="">Categoria 3</a></li>
        <li><a href="">Categoria 4</a></li> -->
  </ul>
</nav>

<main>
  <aside id="lateral">
    <div id="login" class="block_aside">
      <?php if (!isset($_SESSION['identity'])): ?>


        <h3>Entrar a la Web</h3>
        <form action="<?= base_url ?>usuario/login" method="POST">
          <label for="email">Email</label>
          <input type="email" name="email">
          <label for="password">Contraseña</label>
          <input type="password" name="password">
          <input type="submit" value="Entrar">
        </form>
      <?php else: ?>
        <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
      <?php endif; ?>
      <ul class="botones-sidebar">
        
        <?php if (isset($_SESSION['admin'])): ?>

          <li><a href="">Gestionar pedidos</a></li>
          <li><a href="">Gestionar productos</a></li>
          <li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
        <?php endif; ?>

        <?php if (isset($_SESSION['identity'])): ?>
          <li><a href="">Mis pedidos</a></li>
          <li><a href="<?= base_url ?>usuario/logout">Cerrar Sesión</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </aside>