<?php 

session_start();

session_destroy();

echo "<script>window.open('sample.php','_self')</script>";
