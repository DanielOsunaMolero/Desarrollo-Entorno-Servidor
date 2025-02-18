<h1>Registrarse</h1>


<form action="index.php?controller=usuario&action=save" method="POST">
  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" id="nombre" required>

  <label for="apellidos">Apellidos:</label>
  <input type="text" name="apellidos" id="apellidos" required>

  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required>

  <label for="password">Contraseña:</label>
  <input type="password" name="password" id="password" required>

  <button type="submit">Registrase</button>
</form>