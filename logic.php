<?php

$con = mysqli_connect("localhost", "root", "", "n_onestopshop");
if (!$con) {
    echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able to establish Database connection</h3>";
}


$sql = "SELECT *FROM data ORDER BY created_at DESC";
$query = mysqli_query($con, $sql);
