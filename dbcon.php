<?php
$conn = new mysqli('localhost', 'root', '', 'n_onestopshop');
if ($conn->connect_error) {
    die('Error : (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
