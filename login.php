<?php
session_start();

require_once "src/includes/connection.php";
include "src/includes/header.php";


if (isset($_SESSION["session_username"])) {
    header("Location: intropage.php");
    exit();
}

if (isset($_POST["login"])) {
    if (
        (!empty($_POST["username"])) &&
        (!empty($_POST["password"]))
    ) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM usertbl WHERE username ='" . $username . "' AND password = '" . $password . "'";
        $query = mysqli_query($connection,$sql);

        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbusername = $row["username"];
                $dbpassword = $row["password"];
            }
            if (
                ($username == $dbusername)
                &&
                ($password == $dbpassword)
            ) {

                $_SESSION["session_username"] = $username;

                header("Location: intropage.php");
                exit();
            } else {
                $message = "nombre de usuario o contraseña invalida";
            }

        }
    } else {
        $message = "Todos los campos son requeridos";
    }
}

include "src/views/login.php";

include "src/includes/footer.php";
if (!empty($message)) {
    echo '<p class=\"error\">" . "MESSAGE: " . "</p>';
}
