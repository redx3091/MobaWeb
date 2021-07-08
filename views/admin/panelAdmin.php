
<section class="slider">
    <h2>Cargar imágenes al carrusel</h2><br>
    <?php if (isset($_SESSION['imagen']) && $_SESSION['imagen'] == 'complete') : ?>
        <script>
            window.onload = function(){
                swal.fire(
                    'Imagen subida!',
                    'Se ha subido la imagen correctamente!',
                    'success'
                );
            }
        </script>
    <?php elseif (isset($_SESSION['imagen']) && $_SESSION['imagen'] != 'complete') : ?>
        <script>
            window.onload = function(){
                swal.fire(
                    'Imagen no Subida!',
                    'No se ha subido la imagen correctamente!',
                    'error'
                );
            }
        </script>
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
        <script>
            window.onload = function(){
                swal.fire(
                    'Imagen Eliminada!',
                    'Se ha eliminado la imagen correctamente!',
                    'success'
                );
            }
        </script>
    <?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete') : ?>
        <script>
            window.onload = function(){
                swal.fire(
                    'No se ha podido eliminar!',
                    'No Se ha eliminado la imagen correctamente!',
                    'success'
                );
            }
        </script>
    <?php endif; ?>
    <?php Utils::deleteSession('delete'); ?>
        <div class="filterbox" >
            <label for="buscar">Buscar</label>
            <input type="text" name="buscar" id="filterBox">
        </div>
        <table id="table-gest" class="tabla-img-sldier">
            <tr>
                <th>ID</th>
                <th>Imagen</th>
            </tr>
            <?php while($imagen = $imagenes->fetch_object()): ?>
                <tr>
                    <td><?= $imagen->id; ?></td>
                    <td> <a href="<?= base_url ?>uploads/images/<?= $imagen->imagen ?>" download><img src="<?= base_url ?>uploads/images/<?= $imagen->imagen ?>" class="thumb" alt=""> </a> </td>
                    <td>
                        <a href="<?= base_url ?>slider/eliminar&id=<?= $imagen->id ?>" class="button-gestion button-red">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</section>