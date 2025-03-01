<div id="gestion_usuarios">
<h1>Editar Usuario</h1>

<?php
// Si el usuario autenticado es admin o está editando su propio perfil
$es_admin = isset($_SESSION['admin']);
$es_propietario = isset($_SESSION['identity']) && $_SESSION['identity']->id == $usu->id;
?>

<?php if($es_admin || $es_propietario): ?>
    <form action="<?= base_url ?>usuario/actualizar" method="POST">
        <input type="hidden" name="id" value="<?= $usu->id ?>" />

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= $usu->nombre ?>" required />

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?= $usu->apellidos ?>" required />

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $usu->email ?>" required />

        <?php if($es_admin): // Solo los admins pueden cambiar el rol ?>
            <label for="rol">Rol</label>
            <select name="rol">
                <option value="user" <?= $usu->rol == 'user' ? 'selected' : '' ?>>Usuario</option>
                <option value="admin" <?= $usu->rol == 'admin' ? 'selected' : '' ?>>Administrador</option>
            </select>
        <?php endif; ?>

        <input type="submit" value="Guardar Cambios" />
    </form>
<?php else: ?>
    <p>No tienes permisos para editar este usuario.</p>
<?php endif; ?>

</div>
