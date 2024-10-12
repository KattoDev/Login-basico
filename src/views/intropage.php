<div id="welcome">
    <h1>
        bienvenido,
        <span>
            <?php
            echo $_SESSION["actual_session"]["full_name"];
            ?>
        </span>
        !
    </h1>
    <h3>Aquí está la información registrada en la base de datos:</h3>
    <h5>
        ID:
        <span>
            <?php
            echo $_SESSION["actual_session"]["id"];
            ?>
        </span>
    </h5>
    <h5>
        email:
        <span>
            <?php
            echo $_SESSION["actual_session"]["email"];
            ?>
        </span>
    </h5>
    <h5>
        username:
        <span>
            <?php
            echo $_SESSION["actual_session"]["username"];
            ?>
        </span>
    </h5>
    <h5>
        password:
        <span>
            <?php
            echo $_SESSION["actual_session"]["password"];
            ?>
        </span>
    </h5>
    <p>
        <a href="logout.php">Finalice</a>
        sesión aquí
    </p>
</div>