<div id="gestion_usuarios">
    <h1>Editar Usuario</h1>

    <!-- Mostrar errores si existen -->
    <?php if(isset($_SESSION['usuario_errors'])): ?>
        <div class="alert_red">
            <ul>
                <?php foreach($_SESSION['usuario_errors'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['usuario_errors']); ?>
    <?php endif; ?>

    <form action="<?= base_url ?>usuario/updateAdmin" method="POST" class="form-usuario">
        <input type="hidden" name="id" value="<?= $usuario->id ?>" />

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= $usuario->nombre ?>" required />

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?= $usuario->apellidos ?>" required />

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $usuario->email ?>" required />

        <label for="password">Nueva Contraseña (opcional)</label>
        <input type="password" name="password" />

        <label for="rol">Rol</label>
        <select name="rol" required>
            <option value="user" <?= $usuario->rol == "user" ? 'selected' : '' ?>>Usuario</option>
            <option value="admin" <?= $usuario->rol == "admin" ? 'selected' : '' ?>>Administrador</option>
        </select>

        <input type="submit" value="Actualizar"/>
    </form>
</div>

<!-- Validación del Formulario en el Cliente -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-usuario");

    form.addEventListener("submit", function(event) {
        let valid = true;
        let errorMessage = "";

        // Obtener valores de los campos
        const nombre = form.nombre.value.trim();
        const apellidos = form.apellidos.value.trim();
        const email = form.email.value.trim();
        const password = form.password.value.trim();
        const rol = form.rol.value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Validar nombre y apellidos (solo letras y mínimo 2 caracteres)
        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(nombre) || nombre.length < 2) {
            valid = false;
            errorMessage += "El nombre debe contener solo letras y tener al menos 2 caracteres.\n";
        }

        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(apellidos) || apellidos.length < 2) {
            valid = false;
            errorMessage += "Los apellidos deben contener solo letras y tener al menos 2 caracteres.\n";
        }

        // Validar email
        if (!emailPattern.test(email)) {
            valid = false;
            errorMessage += "Introduce un email válido.\n";
        }

        // Validar contraseña (solo si se ingresa una nueva)
        if (password.length > 0 && (password.length < 6 || !/[A-Z]/.test(password) || !/[0-9]/.test(password))) {
            valid = false;
            errorMessage += "Si cambias la contraseña, debe tener al menos 6 caracteres, una mayúscula y un número.\n";
        }

        // Validar rol
        if (rol !== "user" && rol !== "admin") {
            valid = false;
            errorMessage += "Selecciona un rol válido.\n";
        }

        // Si hay errores, prevenir el envío del formulario y mostrar alerta
        if (!valid) {
            alert(errorMessage);
            event.preventDefault();
        }
    });
});
</script>
