<section class="panel-admin">
    <div class="name">
        <?php if(isset($_SESSION['identity'])): ?>
            <h3><?= $_SESSION['identity']->nombre ?></h3>
        <?php endif; ?>
    </div>
</section>
<section class="slider">
    <h2>Cargar imágenes al carrusel</h2><br>
    <?php if (isset($_SESSION['imagen']) && $_SESSION['imagen'] == 'complete') : ?>
        <strong class="alert_green">La imagen se ha subido correctamente!!</strong>
    <?php elseif (isset($_SESSION['imagen']) && $_SESSION['imagen'] != 'complete') : ?>
        <strong class="alert_red">La imagen no se ha subido correctamente</strong>
    <?php endif; ?>
    <?php Utils::deleteSession('imagen'); ?>
    <div class="alimentador">
        <form action="<?= base_url ?>slider/save" enctype="multipart/form-data" method="POST" class="form-slider">
            <label for="imagen">Imagen para Slider</label><br>
            <input type="file" name="imagen" class="in-slider"><br>
            <input type="submit" class="btn-panel"> 
        </form>
    </div>
</section>
<section class="cont-images">
    <div class="img-saved">
    <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete') : ?>
        <strong class="alert_green"> El producto se ha borrado correctamente </strong>
    <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
        <strong class="alert_red"> El registro NO se ha borrado correctamente </strong>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>
        <table class="tabla-img-sldier">
            <tr>
                <th>ID</th>
                <th>Imagen</th>
            </tr>
            <?php while($imagen = $imagenes->fetch_object()): ?>
                <tr>
                    <td><?= $imagen->id; ?></td>
                    <td><img src="<?= base_url ?>uploads/images/<?= $imagen->imagen ?>" class="thumb" alt=""></td>
                    <td>
                        <a href="<?= base_url ?>slider/eliminar&id=<?= $imagen->id ?>" class="button-gestion button-red">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</section>