<div id="gestion_usuarios">
<h1>Crear Usuario</h1>

<form action="<?= base_url ?>usuario/saveAdmin" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required />

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required />

    <label for="email">Email</label>
    <input type="email" name="email" required />

    <label for="password">Contraseña</label>
    <input type="password" name="password" required />

    <label for="rol">Rol</label>
    <select name="rol">
        <option value="user">Usuario</option>
        <option value="admin">Administrador</option>
    </select>

    <input type="submit" value="Guardar"/>
</form>

</div>