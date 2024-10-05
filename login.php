<?php
session_start();

require_once "src/includes/connection.php";
include "src/includes/header.php";

if (isset($_SESSION["session_username"])) {
    // echo "session is set"; //for testing purposes
    header("Location: intropage.php");
}

if (isset($_POST["login"])) {
    if ((!empty($_POST["username"])) && !empty($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = mysql_query("SELECT * FROM usertbl WHERE username ='" . $username . "' AND password = '" . $password . "'");

        $numrows = mysql_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysql_fetch_assoc($query)) {
                $dbusername = $row["username"];
                $dbpassword = $row["password"];
            }
            if ($username == $dbusername && $password == $dbpassword) {

                $_SESSION["session_username"] = $username;

                /* Redirect browser */
                header("Location: intropage.php");
            } else {
                $message = "nombre de usuario o contraseña invalida";
            }
        } else {
            $message = "Todos los campos son requeridos";
        }
    }
}

include "src/views/login.php";
include "src/includes/footer.php";
if (!empty($message)) {
    echo "<p class=\"error\">" . "MESSAGE: " . "</p>";
}
