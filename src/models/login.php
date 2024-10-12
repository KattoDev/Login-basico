<?php
session_start();

include "../includes/header/header.php";

try {
    require_once "../includes/connection.php";
    $status = "conectado";
} catch (\mysqli_sql_exception $sqle) {
    $status = "desconectado";
}

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
        $query = mysqli_query($connection, $sql);

        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbId = $row["id"];
                $dbuserfullname = $row["full_name"];
                $dbEmail = $row["email"];
                $dbusername = $row["username"];
                $dbpassword = $row["password"];
            }
            if (
                ($username == $dbusername)
                &&
                ($password == $dbpassword)
            ) {
                $_SESSION["actual_session"] = array(
                    "id" => $dbId,
                    "full_name" => $dbuserfullname,
                    "email" => $dbEmail,
                    "username" => $username,
                    "password" => $password,
                );
                header("Location: intropage.php");
                exit();
            }
        } else {
            $message = "nombre de usuario o contraseña invalida";
        }
    } else {
        $message = "Todos los campos son requeridos";
    }
}

include "../views/login.php";

include "../includes/footer/footer.php";

if (!empty($message)) {
    echo "<p class=\"error\"> ATENCION: $message </p>";
}