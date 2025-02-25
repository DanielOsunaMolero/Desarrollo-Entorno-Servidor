<h1 style="text-align: center; margin-top:10px">Gestionar Categorias</h1>

<a href="<?=base_url?>categoria/crear" class="boton_crear">
    Crear Categoria
</a>

<table>
    <tr>    
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?php while($cat = $categorias->fetch_object()): ?>
    <tr>    
        <td><?=$cat->id;?></td>
        <td><?=$cat->nombre;?></td>
    </tr>
    <?php endwhile; ?>
</table>