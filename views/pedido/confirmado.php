<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
<section class="confirmado-pedido">
    <div class="datos-envios">
        <table class="datos-env">
        <?php $id_pedido = $_SESSION['id'];?>
        <thead>
            <tr>
                <th>
                    Detalles de tu pedido:
                </th>
            </tr>
        </thead>

        <tbody>
            <?php if($pedido) ?>
                <tr>
                    <td>Numero de pedido: <?= $id_pedido ?> <br></td>
                </tr>
                <tr>
                    <td>Nombre y apellido: <?= $pedido->nombre?> <?= $pedido->apellidos ?><br></td>
                </tr>
                <tr>
                    <td>Pais: <?= $pedido->pais ?> <br></td>
                </tr>
                <tr>
                    <td>Departamento: <?= $pedido->departamento ?><br></td>
                </tr>
                <tr>
                    <td>Ciudad: <?= $pedido->ciudad ?> <br></td>
                </tr>
                <tr>
                    <td>Direccion: <?= $pedido->direccion ?> <br></td>
                </tr>
                <tr>
                    <td>Total a pagar: <?= $pedido->coste ?> $ <br></td>
                </tr>
            <?php endif; ?>
        </tbody>
        </table>
        
    </div>
    
    <div class="tabla-confirm-producto">
       <table class="confirmado-producto">
        <thead>
            <tr>
                <th>
                    Imagen
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Precio
                </th>
                <th>
                    unidades
                </th>
            </tr>
        </thead>
        <tbody>
            <?php while($producto = $productos->fetch_object()):?>
                <tr>
                    <td><img src="<?= base_url ?>uploads/imgproduct/<?= $producto->imagen ?>" width="100px" alt=""></td>
                    <td><a href="<?=base_url?>producto/ver&id_p=<?= $producto->id_p ?>"><?= $producto->nombre ?></a></td>
                    <td><?= $producto->precio ?></td>
                    <td><?= $producto->unidades ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
       </table>
    </div>
</section>



