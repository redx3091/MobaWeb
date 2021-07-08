<section class="contactanos">
    <div class="contenedor-info">
        <div class="info-contactanos">
            <h1>Contáctanos</h1> <br> <br> <br>
            <p class="num-telcontac">
            <i class="fas fa-phone-square-alt"></i> 300 123 1234 
            </p> <br> <br> <br>
            <p class="direccion-contac">
                <i class="fas fa-map-marker-alt"></i> Av. 3 #15-35 Barrio Primavera
            </p> <br> <br> <br> 
            <div id="mapid" class="map">
            </div> <br> <br>
            <i class="fab fa-instagram"></i>  <a href="https://www.instagram.com/mobacoffeecompany/" class="follow-instagram">Síguenos en Instagram</a> <br> <br> 
        </div>
    </div>
    <div class="formulario-contac">
        <form action="<?= base_url ?>contacto/send" method="POST" class="form-contactanos">
            <h1>ENVIANOS UN MENSAJE</h1> <br> <br>
            <label for="nombre">Nombre</label> <br>
            <input type="text" name="nombre"> <br>
            <label for="nombre">Telefono</label> <br>
            <input type="number" name="telefono"> <br>
            <label for="ciudad">Ciudad</label><br>
            <input type="text" name="ciudad"> <br>
            <label for="email">E-mail</label><br>
            <input type="text" name="email"> <br>
            <label for="mensaje">Mensaje</label> <br>
            <textarea name="mensaje" id="" cols="30" rows="10"></textarea> <br>
            <input type="submit" value="Enviar" class="boton-form"> <br>
        </form>
    </div>
</section>