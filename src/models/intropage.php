<?php
session_start();

if (!isset($_SESSION["actual_session"])) {
    header("Location:/");
} else {
    include "../includes/header/header_intropage.php";
    include "../views/intropage.php";
    include "../includes/footer/footer_intropage.php";
}