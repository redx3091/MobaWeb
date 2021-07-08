<div class="cont-gestion">
    <div class="gest">
        <a href="<?= base_url ?>producto/crear">Crear Producto</a>
    </div>
</div>

    <?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
        <script>
            window.onload = function(){
                swal.fire(
                    'Producto Creado!',
                    'Se ha creado o editado el producto correctamente!',
                    'success'
                );
            }
        </script>
    <?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete') : ?>
        <script>
            window.onload = function(){
                swal.fire(
                    'Producto no creado!',
                    'No se ha podido crear o editar el producto correctamente!',
                    'error'
                );
            }
        </script>
    <?php endif; ?>
    <?php Utils::deleteSession('producto'); ?>

    <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
        <script>
            window.onload = function(){
                swal.fire(
                    'Borrado!',
                    'Se ha borrado un producto!',
                    'success'
                );
            }
        </script>
    <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
        <script>
            window.onload = function(){
                swal.fire(
                    'No se ha podido eliminar!',
                    '',
                    'error'
                );
            }
        </script>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>
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
                    <th>Acciones</th>
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
                    <td>
                        <a href="<?= base_url ?>producto/editar&id_p=<?= $producto->id_p ?>" ><img src="<?= base_url ?>assets/img/edit-regular.svg" class="edit-btn"></a> 
                        <a href="<?= base_url ?>producto/eliminar&id_p=<?= $producto->id_p ?>"><img src="<?= base_url ?>assets/img/trash-alt-regular.svg" class="trash"></a>
                    </td>

                </tr>
            <?php endwhile; ?>
        </table>
        </div>
</div>