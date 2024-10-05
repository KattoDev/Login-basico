<div id="welcome">
    <h2>
        bienvenido,
        <span>
            <?php
            echo $_SESSION["session_username"];
            ?>
        </span>
        !
    </h2>
    <p>
        <a href="logout.php">Finalice</a>
        sesión aquí
    </p>
</div>