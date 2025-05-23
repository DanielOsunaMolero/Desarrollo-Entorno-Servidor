<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tienda de Balones</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
  <div id="container">
    <header>
      <div id="logo">
        <img src="./assets/img/Balón_CRV_768x768.png">
        <a href="index.php">Tienda de Balones</a>
      </div>
    </header>

    <nav>
      <ul>
        <li><a href="">Inicio</a></li>
        <li><a href="">Categoria 1</a></li>
        <li><a href="">Categoria 2</a></li>
        <li><a href="">Categoria 3</a></li>
        <li><a href="">Categoria 4</a></li>
      </ul>
    </nav>

    <main>
      <aside id="lateral">
        <div id="login" class="block_aside">
          <h3>Entrar a la web</h3>
          <form action="" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
            <button type="submit">Ingresar</button>
          </form>
          
          <div class="enlaces">
          <a href="">Mis pedidos</a>
          <br>
          <a href="">Gestionar pedidos</a>
          <br>
          <a href="">Gestionar categorias</a>
          </div>
          
        </div>
      </aside>

      <div id="principal">
        <h1>Productos destacados</h1>
        <div id="products">
          <img src="./assets/img/Balón_CRV_768x768.png">
          <h2>Balón CRV</h2>
          <p>50€</p>
          <a href="" class="btn">Comprar</a>
        </div>
        <div id="products">
          <img src="./assets/img/Balón_CRV_768x768.png">
          <h2>Balón CRV</h2>
          <p>50€</p>
          <a href="" class="btn">Comprar</a>
        </div>
        <div id="products">
          <img src="./assets/img/Balón_CRV_768x768.png">
          <h2>Balón CRV</h2>
          <p>50€</p>
          <a href="" class="btn">Comprar</a>
        </div>
      </div>
    </main>

    <footer>
      <p>&copy; Desarrollador por DanielOsuna | <?= date('Y'); ?></p>
    </footer>
  </div>
</body>

</html>