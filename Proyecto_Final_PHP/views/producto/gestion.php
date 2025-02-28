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
            </tr>
        </thead>
            <?php while ($pro = $productos->fetch_object()): ?>
                <tr>
                    <td><?= $pro->id; ?></td>
                    <td><?= $pro->nombre; ?></td>
                    <td><?= $pro->precio; ?> €</td>
                    <td><?= $pro->stock; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>