        <!-- CONTENIDO PRINCIPAL -->
        <section id="content" class="content">
            <div id="inicio" class="inicio">
                <!-- carrucel -->
                <div class="swiper-container mySwiper">
                    <div class="swiper-wrapper">
                        <?php while($imagen = $imagenes->fetch_object()): ?>
                          <!-- <img src="<?= base_url ?>uploads/images/<?= $imagen->imagen ?>" alt="taza-cafe"> -->
                                <div class="swiper-slide">
                                    <?php if($imagen->imagen != null): ?>
                                        <img src="<?= base_url ?>uploads/images/<?= $imagen->imagen ?>" alt="taza-cafe">
                                    <?php else: ?>
                                        <img src="<?=base_url?>assets/img/cafenutricion-t.jpg" alt="">
                                    <?php endif; ?>
                                </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- text -->
                <div id="text-inicio" class="text-inicio">
                    <div class="text-histo">
                        <h3>Somos</h3>
                        <p>
                        Somos una empresa de origen Colombiano
                        ubicada en la ciudad de Cúcuta, Norte de
                        Santander, creada por economistas de la
                        Universidad de Pamplona, cuyo propósito
                        es el cultivo y comercialización del mejor
                        café apoyados por las habilidades y
                        destrezas de las comunidades vulnerables:
                        Población Reinsertados del conflicto Armado,
                        comunidades Afrocolombianas, madres
                        solteras y población LGBTIQ+, entre otras.
                        </p>
                    </div>
                    <div class="image-text">
                        <img src="<?= base_url ?>assets/img/semilla.jpeg" alt="imagen cafe 2">
                    </div>
                </div>
            </div>

            <!-- DESTACADOS -->
            <div class="destacados">
                <?php while($producto = $productos->fetch_object()): ?>
                    <div class="product">
                        <a href="<?= base_url ?>producto/ver&id_p=<?= $producto->id_p ?>"><img class="img-product" src="<?= base_url ?>uploads/imgproduct/<?= $producto->imagen ?>" alt=""></a>
                        <h2><?= $producto->nombre ?></h2>
                        <p> $ <?= $producto->precio ?></p>
                        <p><?= $producto->tipo ?></p>
                        <div class="btn-container">
                            <a href="#">Añadir al carrito</a>
                        </div>
                    </div>
                <?php endwhile; ?>
                
                <!-- <div class="product">
                    <img class="img-product" src="<?= base_url ?>assets/img/producto-muestra-02.png" alt="bolsa-cafe">
                    <h2>Cafe Moba</h2>
                    <h3>Tipo Estilo</h3>
                    <p>$99.000</p>
                    <div class="btn-container">
                        <a href="#">Añadir al carrito</a>
                    </div>
                </div>
                <div class="product">
                    <img class="img-product" src="<?= base_url ?>assets/img/producto-muestra-02.png" alt="bolsa-cafe">
                    <h2>Cafe Moba</h2>
                    <h3>Tipo Estilo</h3>
                    <p>$99.000</p>
                    <div class="btn-container">
                        <a href="#">Añadir al carrito</a>
                    </div>
                </div>
                <div class="product">
                    <img class="img-product" src="<?= base_url ?>assets/img/producto-muestra-02.png" alt="bolsa-cafe">
                    <h2>Cafe Moba</h2>
                    <h3>Tipo Estilo</h3>
                    <p>$99.000</p>
                    <div class="btn-container">
                        <a href="#">Añadir al carrito</a>
                    </div>
                </div> -->
            </div>
            <!-- END DESTACADOS -->

            <!-- HISTORIA -->
            <div class="history">
                <div class="history-img">
                    <img src="<?= base_url ?>assets/img/Logo-03.png" alt="logo-history">
                </div>
                <div class="history-text">
                    <h3>Historia</h3>
                    <p>
                    En el año 1835 se empezaron a exportar los primeros sacos de café producidos
                    en la zona oriental, desde la aduana de Cúcuta. Según cuenta la leyenda el
                    aumento de producción de café en la Región se dio gracias al sacerdote
                    jesuita Francisco Romero en un pueblo de NORTE DE SANTANDER
                    llamado SALAZAR DE LAS PALMAS, quien colocaba como
                    penitencia a sus feligreses la siembra de estas plantas.
                    </p>
                </div>
            </div>
            <!-- END HISTORIA -->

            <!-- FEED INSTAGRAM -->

            <div class="background-feed">
                <div id="instafeed" class="feed-instagram">
                </div>
            </div>
            <!-- END FEED INSTAGRAM -->
        </section>
        <!-- END CONTENIDO PRINCIPAL -->