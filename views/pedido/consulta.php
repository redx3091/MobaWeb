<section class="consulta">
    
    <div class="cont-consulta">
        <h1>Consulta tu pedido  aquí</h1><br>
        <form action="<?= base_url ?>pedido/mi_pedido" method="POST" class="form-consulta">
            <label for="numeropedido">Numero pedido:</label>
            <input type="text" name="numeropedido"> <br>
            <br>
            <input type="submit" value="Buscar" class="btn-consulta">
        </form>
    </div>
    
</section>