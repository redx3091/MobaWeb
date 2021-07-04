<div class="cont-gestion">
    <div class="gest">
        <a href="<?= base_url ?>producto/crear">Crear Producto</a>
    </div>
</div>

    <?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
        <strong class="alert_green"> El producto se ha creado correctamente </strong>
    <?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
        <strong class="alert_red"> El registro NO se ha creado correctamente </strong>
    <?php endif; ?>
    <?php Utils::deleteSession('producto'); ?>

<div class="table-gestion">
       
        <div class="cont-table">
        <div class="filterbox" >
            <label for="buscar">Buscar</label>
            <input type="text" name="buscar" id="filterBox">
        </div>
        <table id="table-gest" class="tabla-gestion">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Tipo</th>
                </tr>
            <?php while($producto = $productos->fetch_object()): ?>
                <tr>
                    <td><?= $producto->id_p ?></td>
                    <td><?= $producto->nombre?></td>
                    <td><?= $producto->descripcion ?></td>
                    <td><?= $producto->precio ?></td>
                    <td><?= $producto->stock ?></td>
                    <td><img src="<?= base_url ?>uploads/imgproduct/<?= $producto->imagen ?>" alt="" class="img-gest"></td>
                    <td><?= $producto->tipo ?></td>
                    
                </tr>
            <?php endwhile; ?>
        </table>
        </div>
</div>