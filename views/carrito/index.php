<section class="carrito-compras">
    <h1>Carrito de compras</h1>
    <?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1 ): ?>
        <table class="detalle-compra">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                    <th></th>
                </tr>
                <?php 
                    foreach($carrito as $indice => $elemento):
                    $producto = $elemento['producto'];
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?php if($producto->imagen != null): ?>
                                <img src="<?= base_url ?>uploads/imgproduct/<?= $producto->imagen ?>" class="img-carrito">
                            <?php else: ?>
                                <img src="<?= base_url  ?>assets/img/producto-muestra-02.png" class="img-carrito">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url ?>producto/ver&id_p=<?= $producto->id_p ?>"><?= $producto->nombre ?></a>
                        </td>
                        <td>
                            <?= $producto->precio ?>
                        </td>
                        <td>
                            
                            <div class="updown-unidades">
                                <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>"><img src="<?= base_url ?>assets/img/minus-solid.svg" class="btn-minus"></a>
                                <?= $elemento['unidades'] ?>
                                <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>"><img src="<?= base_url ?>assets/img/plus-solid.svg" class="btn-plus"></a>
                            </div>
                        </td>
                        <td>
                            <a href="<?= base_url ?>carrito/remove&index=<?= $indice ?>"><img src="<?= base_url ?>assets/img/trash-alt-regular.svg" class="trash"></a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </thead>
        </table>
        <br>
        <div class="delete_all_carrito">
            <a href="<?= base_url ?>carrito/deleteAll" class="btn-delete-all">Vaciar el carrito</a>
        </div>
        <div class="total-carrito">
            <table class="tabla-total">
                <tr>    
                    <th>Total del carrito</th>
                    <th></th>
                </tr>
                <tbody>
                    <tr>
                        <td>
                            subtotal: $
                        </td>
                        <td>
                            <?php $stats = Utils::statsCarrito(); ?>
                            <?= $stats['total'] ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Envío: $</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>
                            Total: $
                                
                        </td>
                        <td><?= $stats['total'] ?></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <div class="conte-btn-realipedido">
                <a href="<?= base_url ?>pedido/hacer" class="btn-hacer-pedido">Realizar pedido</a>
        </div>
    <?php else:?>
        <p>El carrito esta vacio agrega algun producto</p>
    <?php endif; ?>
</section>
