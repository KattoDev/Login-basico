<div class="container mregister">
    <div id="login">
        <h1>registrarse</h1>
        <form name="registerform" id="registerform" action="register.php" method="POST">
            <p>
                <label for="user_login">Nombre completo <br>
                    <input type="text" name="full_name" id="full_name" class="input" size="32" value="" />
                </label>
            </p>

            <p>
                <label for="user_pass">
                    E-mail <br>
                    <input type="text" name="email" id="email" class="input" size="32" value="" />
                </label>
            </p>

            <p>
                <label for="user_pass">Nombre De Usuario<br />
                    <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
            </p>

            <p>
                <label for="user_pass">Contraseña<br />
                    <input type="password" name="password" id="password" class="input" value="" size="32" /></label>
            </p>
            <p class="submit">
                <input type="submit" name="register" id="register" class="button" value="Registrar" />
            </p>

            <p class="regtext">
                ¿Ya tienes una cuenta?
                <a href="login.php">Entra Aquí</a>!
            </p>
        </form>
    </div>
</div>