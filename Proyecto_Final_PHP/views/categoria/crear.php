<div id="crear-categoria">
    <h1>Crear nueva Categoría</h1>

    <!-- Mostrar errores si existen -->
    <?php if(isset($_SESSION['categoria_errors'])): ?>
        <div class="alert_red">
            <ul>
                <?php foreach($_SESSION['categoria_errors'] as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['categoria_errors']); ?>
    <?php endif; ?>

    <form action="<?= base_url ?>categoria/save" method="POST" class="form-categoria">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required/>
        
        <input type="submit" value="Guardar"/>
    </form>
</div>

<!-- Validación del Formulario en el Cliente -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-categoria");

    form.addEventListener("submit", function(event) {
        let valid = true;
        let errorMessage = "";

        // Obtener valores de los campos
        const nombre = form.nombre.value.trim();

        // Validar nombre (mínimo 3 caracteres y solo letras y espacios)
        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/.test(nombre)) {
            valid = false;
            errorMessage += "El nombre debe tener al menos 3 caracteres y solo contener letras y espacios.\n";
        }

        // Si hay errores, prevenir el envío del formulario y mostrar alerta
        if (!valid) {
            alert(errorMessage);
            event.preventDefault();
        }
    });
});
</script>
