<?php
session_start();
if (!isset($_SESSION["session_username"])) {
    header("Location:/");
} else {
    include "src/includes/header.php";
    include "src/views/intropage.php";
    include "src/includes/footer.php";
}