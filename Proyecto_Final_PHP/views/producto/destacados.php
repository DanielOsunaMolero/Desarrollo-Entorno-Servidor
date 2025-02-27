

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





<!-- <form action="<?=base_url?>producto/destacados" method="POST">
  <div id="principal">
    
    <div id="products-container">
      <div class="product">
        <img src="./assets/img/Balón_CRV_768x768.png">
        <h2>Balón CRV</h2>
        <p>50€</p>
        <a href="" class="boton-producto">Comprar</a>
      </div>
      <div class="product">
        <img src="./assets/img/Mochila_CRV_768x768.png">
        <h2>Mochila CRV</h2>
        <p>90€</p>
        <a href="" class="boton-producto">Comprar</a>
      </div>
      <div class="product">
        <img src="./assets/img/Botella_de_agua_CRV_1200x1200.png">
        <h2>Botella CRV</h2>
        <p>15€</p>
        <a href="" class="boton-producto">Comprar</a>
      </div>
      <div class="product">
        <img src="./assets/img/Balón_CRV_768x768.png">
        <h2>Balón CRV</h2>
        <p>50€</p>
        <a href="" class="boton-producto">Comprar</a>
      </div>
      <div class="product">
        <img src="./assets/img/Mochila_CRV_768x768.png">
        <h2>Mochila CRV</h2>
        <p>90€</p>
        <a href="" class="boton-producto">Comprar</a>
      </div>
      <div class="product">
        <img src="./assets/img/Botella_de_agua_CRV_1200x1200.png">
        <h2>Botella CRV</h2>
        <p>15€</p>
        <a href="" class="boton-producto">Comprar</a>
      </div>
    </div>
  </div>
</form> -->
