<div id="gestion_usuarios">

<h1>Editar Producto</h1>

<form action="<?= base_url ?>producto/update" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $pro->id ?>" />

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?= $pro->nombre ?>" required />

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"><?= $pro->descripcion ?></textarea>

    <label for="precio">Precio</label>
    <input type="number" step="0.01" name="precio" value="<?= $pro->precio ?>" required />

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?= $pro->stock ?>" required />

    <label for="categoria">Categoría</label>
    <select name="categoria">
        <?php foreach ($categorias as $cat) : ?>
            <option value="<?= $cat->id ?>" <?= $cat->id == $pro->categoria_id ? 'selected' : '' ?>><?= $cat->nombre ?></option>
        <?php endforeach; ?>
    </select>

    <label for="imagen">Imagen Actual</label>
    <?php if (!empty($pro->imagen)) : ?>
        <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" width="100">
    <?php endif; ?>
    
    <label for="imagen">Cambiar Imagen</label>
    <input type="file" name="imagen" />

    <input type="submit" value="Actualizar" />
</form>

</div>
