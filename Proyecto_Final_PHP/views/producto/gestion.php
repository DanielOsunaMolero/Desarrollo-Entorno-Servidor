<div id="gestion-productos">
    <h1>Gestion Productos</h1>

    <a href="<?= base_url ?>producto/crear" class="boton_crear2">
        Crear Producto
    </a>

    <?php Utils::deleteSession('producto'); ?>

    <div class="tabla-container2">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>STOCK</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <?php while ($pro = $productos->fetch_object()): ?>
                <tr>
                    <td><?= $pro->id; ?></td>
                    <td><?= $pro->nombre; ?></td>
                    <td><?= $pro->precio; ?> €</td>
                    <td><?= $pro->stock; ?></td>
                    <td>
                        <a href="<?= base_url ?>producto/editar&id=<?= $pro->id ?>" class="enlaces_sueltos">Editar</a>
                        <a href="<?= base_url ?>producto/eliminar&id=<?= $pro->id ?>" class="enlaces_sueltos" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>