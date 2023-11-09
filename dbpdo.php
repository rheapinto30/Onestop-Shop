<?php
$db_user = 'root';
$db_pass = '';
$db_name = 'test';
$db_host = 'localhost';

$msqli = new mysqli($db_host, $db_user, $db_pass, $db_name);


if ($msqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();

    try {
        $conn = new PDO("mysql:host{$db_host};dbname{$db_name}", $db_user, $db_pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        //echo 'ERROR: ' . $e - getMessage();
    }
}
