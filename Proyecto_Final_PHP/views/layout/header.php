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
        <img src="<?=base_url?>./assets/img/Balón_CRV_768x768.png">
        <a href="index.php" class="palabra-header">CRV SHOP</a>
      </div>
    </header>

    <?php $categorias = Utils::showCategorias(); ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?=base_url?>">Inicio</a>
                    </li>
                    <?php while($cat = $categorias->fetch_object()):?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>

            </nav>