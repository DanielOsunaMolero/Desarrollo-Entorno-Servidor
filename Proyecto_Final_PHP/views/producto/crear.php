<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar producto <?=$pro->nombre?></h1>
    <?php $url_action = base_url.'producto/save&id='.$pro->id; ?>
<?php else: ?>
    <div id="crear_producto"> 
    <h1>Crear Nuevos productos</h1>
    <?php $url_action = base_url.'producto/save';?>
<?php endif; ?>


<?php if(isset($_SESSION['product_errors'])): ?>
    <div class="alert_red">
        <ul>
            <?php foreach($_SESSION['product_errors'] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['product_errors']); ?>
<?php endif; ?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data" class="form-producto">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '' ?>" required>

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" required><?=isset($pro) && is_object($pro) ? $pro->descripcion : '' ?></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '' ?>" required>

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '' ?>" min="1" required>

    <label for="categoria">Categoría</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria" required>
        <?php while ($cat = $categorias->fetch_object()): ?>
            <option value="<?= $cat->id ?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '' ?>>
                <?= $cat->nombre ?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="imagen">Imagen</label>
    <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
        <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb"/>
    <?php endif; ?>
    <input type="file" name="imagen" accept="image/*">

    <input type="submit" value="Guardar">
</form>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".form-producto");

    form.addEventListener("submit", function(event) {
        let valid = true;
        let errorMessage = "";


        const nombre = form.nombre.value.trim();
        const descripcion = form.descripcion.value.trim();
        const precio = form.precio.value.trim();
        const stock = form.stock.value.trim();
        const categoria = form.categoria.value;
        const imagen = form.imagen.value;

        if (nombre.length < 3) {
            valid = false;
            errorMessage += "El nombre debe tener al menos 3 caracteres.\n";
        }

        if (descripcion.length < 10) {
            valid = false;
            errorMessage += "La descripción debe tener al menos 10 caracteres.\n";
        }

        if (!/^\d+(\.\d{1,2})?$/.test(precio) || parseFloat(precio) <= 0) {
            valid = false;
            errorMessage += "El precio debe ser un número válido mayor que 0.\n";
        }

        if (isNaN(stock) || parseInt(stock) <= 0) {
            valid = false;
            errorMessage += "El stock debe ser un número entero mayor que 0.\n";
        }

        if (!categoria) {
            valid = false;
            errorMessage += "Selecciona una categoría válida.\n";
        }


        if (imagen) {
            const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.test(imagen)) {
                valid = false;
                errorMessage += "La imagen debe ser en formato JPG, JPEG, PNG o GIF.\n";
            }
        }

        if (!valid) {
            alert(errorMessage);
            event.preventDefault();
        }
    });
});
</script>
