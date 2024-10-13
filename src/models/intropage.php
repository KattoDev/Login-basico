<?php
session_start();

if (!isset($_SESSION["actual_session"])) {
    header("Location:/");
    exit();
} else {
    include "../models/header/header_intropage.php";
    include "../views/intropage.php";
    include "../models/footer/footer_intropage.php";
}