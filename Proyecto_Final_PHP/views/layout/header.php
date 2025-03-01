<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRV SHOP</title>
  <link rel="stylesheet" href="<?=base_url?>./assets/css/styles.css">
</head>

<body>
  <div id="container">
    <header>
      <div id="logo">
        <img src="<?= base_url ?>./assets/img/FOTO_LOGO_EQUIPO_2560_X_3623.png">
        <a href="<?= base_url ?>" class="palabra-header">CRV SHOP</a>
      </div>
    </header>

    <?php $categorias = Utils::showCategorias(); ?>

    <nav>
      <ul>
        <li><a href="<?= base_url ?>">Inicio</a></li>

        <?php
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();
        while ($cat = $categorias->fetch_object()) :
        ?>
          <li>
            <a href="<?= base_url ?>producto/categoria&id=<?= $cat->id ?>">
              <?= $cat->nombre ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </nav>