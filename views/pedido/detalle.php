
<section class="detalle-pedido">
    <h1>Detalle del pedido</h1>
    <?php if($pedido): ?>
        <?php if(isset($_SESSION['admin'])): ?>
            <div class="cambio-estado">
                <h3 class="esta-cambiar">Cambiar estado del pedido</h3>
                <form action="<?= base_url ?>pedido/estado" method="POST">
                    <input type="hidden" value="<?= $pedido->id ?>" name="pedido_id">
                    <select name="estado" id="" class="select-estado">
                        <option value="confirm" <?= $pedido->estado == "confirm" ? 'selected' : '';?>>Pendiente</option>
                        <option value="preparation" <?= $pedido->estado == "preparation" ? 'selected' : '';?>>En preparación</option>
                        <option value="ready" <?= $pedido->estado == "ready" ? 'selected' : '';?>>Preparado para envió y recolección</option>
                        <option value="sended" <?= $pedido->estado == "sended" ? 'selected' : '';?>>Enviado</option>
                    </select>
                    <input type="submit" value="Cambiar Estado" class="btn-estado">
                </form>
            </div>

            <div class="tablas-detalle">
                    <table class="dat-envio">
                        <thead>
                            <tr>
                                <th>
                                    Datos de Envio:
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre y Apellido: <?=$pedido->nombre?> <?= $pedido->apellidos ?></td>
                            </tr>
                            <tr>
                                <td>País: <?= $pedido->pais ?></td>
                            </tr>
                            <tr>
                                <td>Departamento:<?= $pedido->departamento ?></td>
                            </tr>
                            <tr>
                                <td>Ciudad:<?= $pedido->ciudad ?></td>
                            </tr>
                            <tr>
                                <td>Teléfono:<?= $pedido->telefono ?></td>
                            </tr>
                            <tr>
                                <td> Email: <?= $pedido->email ?></td>
                            </tr>
                            <tr>
                                <td>Dirrecion : <?= $pedido->direccion ?></td>
                            </tr>
                            <tr>
                                <td>Estado: <?= Utils::showStatus($pedido->estado); ?></td>
                            </tr>
                            <tr>
                                <td>Numero de pedido: <?= $pedido->id ?></td>
                            </tr>
                            <tr>
                                <td>Total a pagar: $ <?= $pedido->coste ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
                <div class="tabla-det-prod">
                    <h3 class="title-det-prod"> Productos:</h3>
                    <table class="det-prod">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Unidades</th>
                        </tr>
                        <?php while ($producto = $productos->fetch_object()): ?>
                            <tr>
                                <td>
                                    <?php if ($producto->imagen != null): ?>
                                        <img src="<?= base_url ?>uploads/imgproduct/<?= $producto->imagen ?>" width="100px" class="img_carrito" />
                                    <?php else: ?>
                                        <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" />
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $producto->nombre ?>
                                </td>
                                <td>
                                    <?= $producto->precio ?>
                                </td>
                                <td>
                                    <?= $producto->unidades ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
                
            </div>
            
  
    <?php endif ?>
</section>
