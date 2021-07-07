<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Moba</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/text-inicio.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/fonts.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/history.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/header.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/menu.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/destacados.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/feed.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/footer.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/elegirnos.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/compromiso.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/historia-div.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/mvv.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/tienda.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/contacto.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/login.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/panel.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/gestion.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/crear.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/paginate.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/detalle-producto.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/carrito.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/hacer.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/confirmado.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/gestion-pedido.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/detalle-ped.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/view-history.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/mis_pedidos.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/slider-pro.min.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/slider.css">
    <link 
        rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""
    />
</head>

<body>
    <!-- container start -->
    <section id="container" class="container">
        <!-- CABECERA -->
        <header id="header" class="header">
            <div id="logo">
                <a href="<?= base_url ?>inicio/index">Moba</a>
                <img class="img-header" src="<?= base_url ?>assets/img/linea-moba-02.png" alt="linea-moba">
                <h4>coffee company</h4>
            </div>
        </header>
        <!-- END CABECERA -->
        <?php if(isset($_SESSION['admin'])):?>

<?php else: ?>    
    <div  class="container-btn-carrito">
        <a href="<?= base_url ?>carrito/index" class="flotante"><img src="<?= base_url ?>assets/img/cart-plus-solid.svg" alt=""></a>
    </div>
<?php endif; ?>
        <!-- MENU -->
        <nav id="menu" class="menu">
            <div class="control-menu">
                <a href="#menu" class="open"><span>Menu</span></a>
                <a href="#" class="close"><span>Cerras menu</span></a>
            </div>
            <ul class="nav-items">
                <?php if(isset($_SESSION['admin'])): ?>
                    <li id="inicio">
                        <a href="<?= base_url ?>slider/panel">Panel Slider</a>
                    </li>
                    <li id="historia">
                        <a href="<?= base_url ?>producto/gestion">Productos</a>
                    </li>
                    <li id="tienda">
                        <a href="<?= base_url ?>pedido/gestion">Pedidos</a>
                    </li>
                    <?php if(isset($_SESSION['identity'])) : ?>
                        <li><a href="<?= base_url ?>admin/logout">Cerrar sesión</a></li>
                     <?php endif; ?>
                <?php else: ?>
                    <li id="inicio">
                        <a href="<?= base_url ?>inicio/index">Inicio</a>
                    </li>
                    <li id="historia">
                        <a href="<?= base_url ?>history/index">Historia</a>
                    </li>
                    <li id="tienda">
                        <a href="<?= base_url ?>producto/tienda">Tienda</a>
                    </li>
                    <li id="contactanos">
                        <a href="<?= base_url ?>contacto/index">Contáctanos</a>
                    </li>
                    <li>
                        <a href="<?= base_url ?>pedido/consultarPedido">Tus pedidos</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- END MENU -->