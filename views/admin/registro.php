<h1>Registrarse</h1>
<form action="<?=base_url?>admin/save" method="POST">

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
  <strong class="alert_green">Registro completado correctamente </strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] != 'complete'):
    $error = $_SESSION['register'];
endif; ?>

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" >

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" >

    <label for="email">Email</label>
    <input type="email" name="email" >

    <label for="password">Password</label>
    <input type="password" name="password" >

    <input type="submit" value="Registrarse">
</form>
<!-- <?php Utils::deleteSession('register'); ?> -->