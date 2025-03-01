<div id="registro">
    <h1>Registro de Usuario</h1>


    <?php if(isset($_SESSION['success_message'])): ?>
        <div class="alert_green" style="color: white;">
            <?= $_SESSION['success_message']; ?>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>


    <?php if(isset($_SESSION['error_message'])): ?>
        <div class="alert_red">
            <?= $_SESSION['error_message']; ?>
        </div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

    <form action="<?= base_url ?>usuario/save" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required />

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" required />

        <label for="email">Email</label>
        <input type="email" name="email" required />

        <label for="password">Contraseña</label>
        <input type="password" name="password" required />

        <input type="submit" value="Registrarse"/>
    </form>
</div>



<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-regis");

    form.addEventListener("submit", function(event) {
        let valid = true;
        let errorMessage = "";

        // Cogemos los valores de los campos
        const nombre = form.nombre.value.trim();
        const apellidos = form.apellidos.value.trim();
        const email = form.email.value.trim();
        const password = form.password.value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        
        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(nombre) || nombre.length < 2) {
            valid = false;
            errorMessage += "El nombre debe contener solo letras y tener al menos 2 caracteres.\n";
        }

        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(apellidos) || apellidos.length < 2) {
            valid = false;
            errorMessage += "Los apellidos deben contener solo letras y tener al menos 2 caracteres.\n";
        }

        if (!emailPattern.test(email)) {
            valid = false;
            errorMessage += "Introduce un email válido.\n";
        }

        // Validamos la contraseña
        if (password.length < 6 || !/[A-Z]/.test(password) || !/[0-9]/.test(password)) {
            valid = false;
            errorMessage += "La contraseña debe tener al menos 6 caracteres, una mayúscula y un número.\n";
        }

        if (!valid) {
            alert(errorMessage);
            event.preventDefault();
        }
    });
});
</script>
