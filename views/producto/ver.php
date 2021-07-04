<section class="detalles">

    <?php if(isset($pro)): ?>
        
        <div class="detail-product">
            <?php if($pro->imagen != null): ?>
                <img src="<?= base_url ?>uploads/imgproduct/<?= $pro->imagen ?>" alt="" class="img-producto">
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/producto-muestra-02.png" alt="">
            <?php endif; ?>
        </div>
        <div class="detalles-producto">
                <h1><?= $pro->nombre ?></h1>
                <p><?= $pro->descripcion ?></p>
                <p><?= $pro->tipo ?></p>
                <p> $ <?= $pro->precio ?></p>
                <div class="container-btn">
                <a class="btn-detail" href="<?= base_url ?>carrito/add&id_p=<?= $pro->id_p ?>">Añadir al carrito</a>
                </div>
        </div>
    <?php else: ?>
        <h1>El producto que buscas no existe</h1>
    <?php endif; ?>

</section>
