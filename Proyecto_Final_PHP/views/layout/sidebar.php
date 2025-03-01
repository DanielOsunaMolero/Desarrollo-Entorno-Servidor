<main>
  <!-- SIDEBAR -->
  <aside id="lateral">
    <div id="login" class="block_aside">
      <?php if (!isset($_SESSION['identity'])): ?>
        <!-- Formulario de Login -->
        <form action="<?= base_url ?>usuario/login" method="POST">
          <label for="email">Email</label>
          <input type="email" name="email" required>

          <label for="password">Contraseña</label>
          <input type="password" name="password" required>

          <input type="submit" value="Entrar">
        </form>

        <a href="<?= base_url ?>usuario/registro" class="botones-sidebar">Registrate Aquí</a>
      <?php else: ?>

        <h3><?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellidos ?></h3>
      <?php endif; ?>


      <ul class="botones-sidebar-ul">
        <?php if (isset($_SESSION['admin'])): ?>
          <li><a href="" class="botones-sidebar">Gestionar pedidos</a></li>
          <li><a href="<?= base_url ?>producto/gestion" class="botones-sidebar">Gestionar productos</a></li>
          <li><a href="<?= base_url ?>categoria/index" class="botones-sidebar">Gestionar categorías</a></li>
          <li><a href="<?= base_url ?>usuario/gestion" class="botones-sidebar">Gestionar usuarios</a></li>
        <?php else: ?>


        <?php endif; ?>

        <?php if (isset($_SESSION['identity']) && !isset($_SESSION['admin'])): ?>

          <li><a href="" class="botones-sidebar">Mis pedidos</a></li>
          <li><a href="<?= base_url ?>usuario/editar" class="botones-sidebar">Editar Perfil</a></li>
        <?php endif; ?>

        <?php if (isset($_SESSION['identity'])): ?>

          <li><a href="<?= base_url ?>usuario/logout" class="botones-sidebar">Cerrar Sesión</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </aside>

  <?php if (isset($vista)) {
    include $vista;
  } ?>



  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const form = document.querySelector(".form-login");

      form.addEventListener("submit", function(event) {
        let valid = true;
        let errorMessage = "";

        const email = form.email.value.trim();
        const password = form.password.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


        if (!emailPattern.test(email)) {
          valid = false;
          errorMessage += "Introduce un email válido.\n";
        }

        if (password.length < 6) {
          valid = false;
          errorMessage += "La contraseña debe tener al menos 6 caracteres.\n";
        }


        if (!valid) {
          alert(errorMessage);
          event.preventDefault();
        }
      });
    });
  </script>