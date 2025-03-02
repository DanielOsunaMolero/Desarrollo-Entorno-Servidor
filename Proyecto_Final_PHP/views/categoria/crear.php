<div id="crear-categoria">
    <h1>Crear nueva Categoría</h1>

    
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


<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-categoria");

    form.addEventListener("submit", function(event) {
        let valid = true;
        let errorMessage = "";


        const nombre = form.nombre.value.trim();

        // validamos nombre
        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/.test(nombre)) {
            valid = false;
            errorMessage += "El nombre debe tener al menos 3 caracteres y solo contener letras y espacios.\n";
        }

   
        if (!valid) {
            alert(errorMessage);
            event.preventDefault();
        }
    });
});
</script>
