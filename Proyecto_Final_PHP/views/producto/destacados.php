

<div id="products-container">



<?php while($product = $productos->fetch_object()) : ?>
    <div class="product">

            <?php if($product->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="Camiseta">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/no imagen.avif" alt="Camiseta">
            <?php endif; ?>
        <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
            <h2><?=$product->nombre?></h2>
        </a>
        <p><?=$product->precio?> €</p>
        <a href="<?= base_url ?>carrito/add&id=<?=$product->id?>" class="boton-producto">Comprar</a>
    </div>
<?php endwhile; ?>
</div>

