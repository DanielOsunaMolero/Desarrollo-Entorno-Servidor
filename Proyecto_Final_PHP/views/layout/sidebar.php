<main>
  <!-- SIDEBAR -->
  <aside id="lateral">
    <div id="login" class="block_aside">
      <?php if (!isset($_SESSION['identity'])): ?>
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

      <ul class="botones-sidebar-ul">
        <a href="<?= base_url ?>usuario/registro" class="botones-sidebar">Registrate Aquí</a>
        <?php if (isset($_SESSION['admin'])): ?>
          <li><a href="" class="botones-sidebar">Gestionar pedidos</a></li>
          <li><a href="" class="botones-sidebar">Gestionar productos</a></li>
          <li><a href="<?= base_url ?>categoria/index" class="botones-sidebar">Gestionar categorías</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['identity'])): ?>
          <li><a href="" class="botones-sidebar">Mis pedidos</a></li>
          <li><a href="<?= base_url ?>usuario/logout" class="botones-sidebar">Cerrar Sesión</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </aside>

    <?php if (isset($vista)) { include $vista; } ?>


