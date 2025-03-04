<?php

/**
 * Checks the inputs
 * @return array [the check value (true or false), message];
 */
function checkLoginInputs(): array
{
    if ((!empty($_POST["username"])) && (!empty($_POST["password"]))) {
        return [true, "Los campos están completos"];
    } else {
        return [false, "Todos los campos son requeridos"];
    }
};


/**
 * checks if the user is on the database
 * @param mysqli $connection
 * @return array [the check value (true or false), message]
 */
function login($connection): array
{

    $sql = "SELECT * FROM usertbl WHERE username = ? AND password = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        return [false, "Por favor compruebe el usuario y contraseña"];
    } else {
        $row = $result->fetch_assoc();
        $_SESSION["actual_session"] =
            [
                "id" => $row["id"],
                "full_name" => $row["full_name"],
                "email" => $row["email"],
                "username" => $row["username"],
                "password" => $row["password"],
            ];
        return [true, "Se ha encontrado el usuario"];
    }
}
