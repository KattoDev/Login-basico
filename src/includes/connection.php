<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/database/data.php';


$connection = mysqli_connect(
    $credentials['host'],
    $credentials['username'],
    $credentials['password'],
    $credentials['db'],
    $credentials['port']
);


if (!$connection) {
    die("connection failed: " . mysqli_connect_error());
}
