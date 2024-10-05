<?php
require_once "src/includes/connection.php";
include "src/includes/header.php";

if (isset($_POST["register"])) {

    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (
        empty($full_name) ||
        empty($email) ||
        empty($username) ||
        empty($password)
    ) {
        $message = "Debe rellenar todos los campos";
    } else {

        $sql = "SELECT * FROM usertbl WHERE username='" . $username . "'";
        $query = mysqli_query($sql);
        $numrows = mysqli_num_rows($query);

        if ($numrows == 0) {
            $sql = "INSERT INTO usertbl
                (full_name, email, username, password)
                VALUES
                ('$full_name', '$email', '$username', '$password')";

            $result = mysqli_query($sql);

            if ($result) {
                $message = "Cuenta correctamente creada";
            } else {
                $message = "Error al ingresar datos de la información";
            }
        } else {
            $message = "El nombre de usuario ya existe, por favor intenta con otro";
        }
    }
}

if (!empty($message)) {
    echo "<p class=\"error\">" . $message . "</p>";
}

include "src/views/register.php";
include "src/includes/footer.php";
