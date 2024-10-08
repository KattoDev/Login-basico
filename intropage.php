<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION["session_username"])) {
    header("Location:login.php");
} else {
    include "src/includes/header.php";
    include "src/views/intropage.php";
    include "src/includes/footer.php";
}