<section class="cont-crear">
    <h1>Crear Producto Nuevo</h1>
    <div class="form-crear">
        <form action="<?= base_url ?>producto/save" method="POST" enctype="multipart/form-data" class="crear">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">

            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion">

            <label for="precio">Precio</label>
            <input type="text" name="precio">

            <label for="stock">Stock</label>
            <input type="number" name="stock">

            <label for="tipo">Tipo</label>
            <?php $tipos = Utils::showTipos(); ?>
            <select name="tipo" >
                <?php while($tipo = $tipos->fetch_object()): ?>
                <option value="<?= $tipo->id_t ?>"><?= $tipo->tipo ?></option>
                <?php endwhile; ?>
            </select>

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" class="up-img">
            <input type="submit" value="Crear" class="btn-crear">
        </form>
    </div>
</section>