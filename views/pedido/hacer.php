<section class="hacer-pedido">
    <h1>Realizar pedido</h1>
    <p>
        <a class="btn-regresar" href="<?= base_url ?>carrito/index">Volver al Carrito</a>
    </p>
    <br>
    <div class="datos-envio">
    <br>
        <h3>Datos de envio</h3>
        <form action="<?= base_url ?>pedido/add" method="POST" class="form-hacer">
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" required>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label for="empresa">Nombre de la Empresa (Opcional):</label>
            <input type="text" name="empresa">
            
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" required>

            <label for="departamento">Departamento:</label>
            <input type="text" name="departamento" required>

            <label for="pais">País:</label>
            <input type="text" name="pais" required>

            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required>

            <label for="email">Direccion correo electronico:</label>
            <input type="text" name="email"require>
            <input type="submit" value="Confirmar pedido" class="btn-confir-hacer">
        </form>
    </div>
</section>

    

