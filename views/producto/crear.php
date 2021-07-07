<section class="cont-crear">
<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar producto <?= $pro->nombre ?></h1>
    <?php $url_action = base_url . "producto/save&id_p=" . $pro->id_p; ?>
<?php else : ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url . "producto/save"; ?>
<?php endif; ?>
    <div class="form-crear">
        <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data" class="crear">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion"><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

            <label for="precio">Precio</label>
            <input type="text" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">

            <label for="stock">Stock</label>
            <input type="number" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">

            <label for="tipo">Tipo</label>
            <?php $tipos = Utils::showTipos(); ?>
            <select name="tipo" >
                <?php while($tipo = $tipos->fetch_object()): ?>
                <option value="<?= $tipo->id_t ?>" <?= isset($pro) && is_object($pro) && $tipo->id_t == $pro->tipo_id ? 'selected' : ''; ?>>
                    <?= $tipo->tipo ?>
                </option>
                <?php endwhile; ?>
            </select>

            <label for="imagen">Imagen</label>
            <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
                <img src="<?= base_url ?>uploads/imgproduct/<?= $pro->imagen ?>" width="100px">
            <?php endif; ?>
            <input type="file" name="imagen" class="up-img">
            <input type="submit" value="Guardar" class="btn-crear">
        </form>
    </div>
</section>