<div id="gestion_usuarios">

    <h1>Gestionar Usuarios</h1>
    <a href="<?= base_url ?>usuario/crear" class="boton_crear2">
        Crear Usuario
    </a>

    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
        <?php while ($user = $usuarios->fetch_object()): ?>
            <tr>
                <td><?= $user->id; ?></td>
                <td><?= $user->nombre; ?></td>
                <td><?= $user->apellidos; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->rol; ?></td>
                <td>
                    <a href="<?= base_url ?>usuario/editar&id=<?= $user->id ?>" class="enlaces_sueltos">Editar</a>
                    <a href="<?= base_url ?>usuario/eliminar&id=<?= $user->id ?>" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')" class="enlaces_sueltos">Eliminar</a>
                </td>

            </tr>
        <?php endwhile; ?>
    </table>

</div>