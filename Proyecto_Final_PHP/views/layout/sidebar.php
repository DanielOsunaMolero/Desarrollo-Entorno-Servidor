<main>
  <!-- SIDEBAR -->
  <aside id="lateral">
  <div id="login" class="block_aside">
      <?php if (!isset($_SESSION['identity'])): ?>
        <!-- Formulario de Login -->
        <form action="<?= base_url ?>usuario/login" method="POST">
          <label for="email">Email</label>
          <input type="email" name="email">
          <label for="password">Contraseña</label>
          <input type="password" name="password">
          <input type="submit" value="Entrar">
        </form>
        <!-- Solo muestra el botón de registro si NO hay sesión iniciada -->
        <a href="<?= base_url ?>usuario/registro" class="botones-sidebar">Registrate Aquí</a>
      <?php else: ?>
        <!-- Información del usuario logueado -->
        <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
      <?php endif; ?>

      <!-- Menú lateral -->
      <ul class="botones-sidebar-ul">
        <?php if (isset($_SESSION['admin'])): ?>
          <li><a href="" class="botones-sidebar">Gestionar pedidos</a></li>
          <li><a href="<?= base_url ?>producto/gestion" class="botones-sidebar">Gestionar productos</a></li>
          <li><a href="<?= base_url ?>categoria/index" class="botones-sidebar">Gestionar categorías</a></li>
          <li><a href="<?= base_url ?>usuario/gestion" class="botones-sidebar">Gestionar usuarios</a></li>
        <?php else: ?>
          <!-- Si NO es admin, muestra sus pedidos -->
          
        <?php endif; ?>

        <?php if (isset($_SESSION['identity']) && !isset($_SESSION['admin'])): ?>
          <!-- Solo se muestra "Editar Perfil" si el usuario es normal (NO admin) -->
          <li><a href="" class="botones-sidebar">Mis pedidos</a></li>
          <li><a href="<?= base_url ?>usuario/editar" class="botones-sidebar">Editar Perfil</a></li>
        <?php endif; ?>

        <?php if (isset($_SESSION['identity'])): ?>
          <!-- Botón de Cerrar Sesión visible para todos los usuarios logueados -->
          <li><a href="<?= base_url ?>usuario/logout" class="botones-sidebar">Cerrar Sesión</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </aside>

    <?php if (isset($vista)) { include $vista; } ?>


