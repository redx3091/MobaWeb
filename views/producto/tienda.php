<section class="tienda">

    <div class="selector">
        <form action="<?= base_url ?>producto/index"  method="POST" class="form-select">
            <select name="orderby"  onchange="this.form.submit()" class="select-tipos">
                <?php if(isset($_POST['orderby'])):?>
                <option value="id_p" <?= $_POST['orderby']== 'id_p' ? 'selected' : ''?> >Orden por defecto</option>
                <?php else: ?>
                <option value="id_p">Orden por defecto</option>
                <?php endif; ?>
                <?php if(isset($_POST['orderby'])):?>
                <option value="ASC" <?= $_POST['orderby']== 'ASC' ? 'selected' : ' '?>>Ordenar de menor a mayor</option>
                <?php else: ?>
                <option value="ASC">Ordenar de menor a mayor</option>
                <?php endif; ?>
                <?php if(isset($_POST['orderby'])):?>
                <option value="DESC" <?= $_POST['orderby']== 'DESC' ? 'selected' : ' '?>>Ordenar de mayor a menor</option>
                <?php else: ?>
                <option value="DESC">Ordenar de mayor a menor</option>
                <?php endif; ?>
                <?php if(isset($_POST['orderby'])):?>
                <option value="tipo" <?= $_POST['orderby']== 'tipo' ? 'selected' : ' '?>>Ordenar por tipo</option>
                <?php else: ?>
                <option value="tipo">Ordenar por tipo</option>
                <?php endif; ?>
                <?php if(isset($_POST['orderby'])):?>
                <option value="fecha" <?= $_POST['orderby']== 'fecha' ? 'selected' : ' '?>>Ordenar por últimos</option>  
                <?php else: ?>
                <option value="fecha">Ordenar por últimos</option>
                <?php endif; ?> 
            </select>
            <input type="hidden" name="page" value="1">
        </form>
    </div>

    <div class="producto-container">
    <?php while($producto = $productos->fetch_object()): ?>
        <div class="producto-tienda">
            <a href="<?= base_url ?>producto/ver&id_p=<?= $producto->id_p ?>"><img class="img-producto-tienda" src="<?= base_url ?>uploads/imgproduct/<?= $producto->imagen ?>" alt=""></a>
            <p class="titl-tienda"><?= $producto->nombre ?></p>
            <p class="tip-pro"><?= $producto->tipo ?></p>
            <h3 class="precio-tienda">$ <?= $producto->precio ?></h3>
            <a href="<?= base_url ?>carrito/add&id_p=<?= $producto->id_p ?>" class="btn-anadir">Al carrito</a>
        </div>
        
    <?php endwhile; ?>
    </div>
</section>