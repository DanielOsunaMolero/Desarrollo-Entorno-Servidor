
<div id="products-container">
    <?php while ($prod = $productos->fetch_object()) : ?>
        <div class="product">
            <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" alt="<?= $prod->nombre ?>">
            <h2><?= $prod->nombre ?></h2>
            <p><?= $prod->precio ?> €</p>
            <a href="" class="boton-producto">Comprar</a>
        </div>
    <?php endwhile; ?>
</div>

