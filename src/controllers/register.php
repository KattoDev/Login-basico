<?php

function checkRegisterInputs(): array
{
    if (
        empty($_POST["full_name"]) ||
        empty($_POST["email"]) ||
        empty($_POST["username"]) ||
        empty($_POST["password"])
    ) {
        return [false, "Debe rellenar todos los campos"];
    } else {
        return [true, "los campos están completos"];
    }
}

/**
 * Summary of register
 * @param mysqli $connection
 * @return array
 */
function register($connection): array
{
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // comprobar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return [false, "Correo electronico no valido"];
    }

    // comprobar usuario en la db
    $sql = "SELECT * FROM usertbl WHERE username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows !== 0) {
        $stmt->close();
        return [false, "El nombre de usuario ya existe, por favor intenta con otro"];
    } else {
        // registrar usuario en la db
        $sql = "INSERT INTO usertbl (full_name, email, username, password) VALUES (?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $full_name, $email, $username, $password);
        if ($stmt->execute()) {
            $stmt->close();
            return [true, "Cuenta correctamente creada"];
        } else {
            $stmt->close();
            return [false, "Error al registrar datos"];
        }
    }
}
