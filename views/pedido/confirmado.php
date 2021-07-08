<section class="confirmado-pedido">
<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
     <script>
        window.onload = function(){
            swal.fire(
                'Su Pedido se ha creado!',
                'En esta sección podrá revisar sus datos y sus productos comprado!',
                'success'
            );
        }
    </script>
    <?php $id_pedido = $_SESSION['id']; ?>
    <div class=" mensaje-confirmado">
        <h1>Tu pedido se ha confirmado</h1>
        <p>
        Tu pedido ha sido generado con éxito, una vez confirmado el pago del pedido,
        sera procesado y enviado.
        </p>
        <br>
        <h3>Datos de pago:</h1>
        <p>Cuenta bancaria Nº 0000000000000000</p>
    </div>
    
<div class="ped-confir-datos">
<div class="datos-envios">
        <?php if($pedido): ?>
        <h3>Detalles de tu pedido:</h3><br>
        <p>Nombre y apellido: <?= $pedido->nombre?> <?= $pedido->apellidos ?></p><br>
        <p>Numero de pedido: <?= $id_pedido->id?> </p><br>
        <p>Pais: <?= $pedido->pais ?></p><br>
        <p>Departamento: <?= $pedido->departamento ?></p><br>
        <p>Ciudad: <?= $pedido->ciudad ?></p><br>
        <p>Direccion: <?= $pedido->direccion ?></p><br>
        <p>Total a pagar: <?= $pedido->coste ?></p><br>
       
    </div>
    
    <div class="tabla-confirm-producto">
        <h3>Productos:</h3>
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

        
  
    <?php endif ?>
</div>
    
<?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <p>Tu pedido no ha podido procesarse</p>
<?php endif; ?>
</section>