<section class="conte-login">
    <h1>Bienvenido admin</h1><br> <br>
    <div class="login">
        <form action="<?= base_url ?>admin/login" method="POST" class="log-form">
            <label for="email">Email:</label>
            <input type="email" name="email" class="in-email"><br> <br>
            <label for="password">Password:</label>
            <input type="password" name="password" class="in-pass"><br>

            <input type="submit" value="Entrar" class="btn-login">
        </form>
    </div>
</section>
