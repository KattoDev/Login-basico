<?php
session_start();

include "../models/header/header.php";

try {
    require_once "../controllers/connection.php";
    $status = "conectado";
} catch (\mysqli_sql_exception $sqle) {
    $status = "desconectado";
}

if (isset($_SESSION["session_username"])) {
    header("Location: intropage.php");
    exit();
}

if (isset($_POST["login"])) {
    include "../controllers/login.php";
    $checkout = checkLoginInputs();

    if ($checkout[0] === false) {
        $message = $checkout[1];
    } else {

        $logincheck = login($connection);
        if ($logincheck[0] === false) {
            $message = $logincheck[1];
        } else {
            header("Location: intropage.php");
            exit();
        }
    }
}

include "../views/login.php";
include "../models/footer/footer.php";

if (!empty($message)) {
    echo "<p class=\"error\"> ATENCION: $message </p>";
}
