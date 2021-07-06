<section class="tu-pedido">
    <?php $id_pedido = $_POST['numeropedido'] ?>
    <div class="tit-ped">
        <h1>El estado de tu pedido Nº <?= $id_pedido ?>  es</h1>
    </div>
    
    <div class="cont">
        <?php while($pedido = $pedidos->fetch_object()): ?>
            <div class="table-datos">
                <table class="estado-ped">
                    <thead>
                        <tr>
                            <th>Tu datos de envio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre y Apellidos: </td>
                            <td>  <?= $pedido->nombre ?> <?= $pedido->apellidos ?> </td>
                        </tr>
                        <tr>
                            <td> Pais: </td>
                            <td>  <?= $pedido->pais ?> </td>
                        </tr>
                        <tr>
                            <td> Ciudad: </td>
                            <td>  <?= $pedido->ciudad ?> </td>
                        </tr>
                        <tr>
                            <td> Departamento: </td>
                            <td>  <?= $pedido->departamento ?> </td>
                        </tr>
                        <tr>
                            <td> Dirección: </td>
                            <td>  <?= $pedido->direccion ?> </td>
                        </tr>
                        <tr>
                            <td> Telefono: </td>
                            <td>  <?= $pedido->telefono ?> </td>
                        </tr>
                        <tr>
                            <td> Estado: </td>
                            <td> <?= Utils::showStatus($pedido->estado) ?> </td>
                        </tr>
                        <tr>
                            <td> Coste: </td>
                            <td>  <?= $pedido->coste ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php endwhile; ?>
            <div class="tables-prod">
                <?php while($producto = $peds->fetch_object()): ?>
                    <table class="pedido-tu">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Unidades</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><img width="100px" src="<?= base_url ?>uploads/imgproduct/<?= $producto->imagen ?>" alt=""></td>
                            <td><?= $producto->nombre ?></td>
                            <td><?= $producto->precio ?></td>
                            <td><?= $producto->unidades ?></td>
                        </tr>
                        </tbody>
                    </table>
                <?php endwhile; ?>
            </div>
    </div>
    
   
</section>