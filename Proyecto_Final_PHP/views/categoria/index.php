<div id="gestionar-categorias">
    <h1>Gestionar Categorías</h1>

    <a href="<?=base_url?>categoria/crear" class="boton_crear">
        Crear Categoría
    </a>

    <div class="tabla-container">
        <table>
            <thead>
                <tr>    
                    <th>ID</th>
                    <th>NOMBRE</th>
                </tr>
            </thead>
            <tbody>
                <?php while($cat = $categorias->fetch_object()): ?>
                <tr>    
                    <td><?=$cat->id;?></td>
                    <td><?=$cat->nombre;?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
