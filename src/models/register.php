<?php
require_once "../controllers/connection.php";
include "header/header_register.php";

// if (isset($_POST["register"])) {

// }

if (!empty($message)) {
    echo "<p class='error'> $message </p>";
}

include "../views/register.php";
include "footer/footer_intropage.php";
