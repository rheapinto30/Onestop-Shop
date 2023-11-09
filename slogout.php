<?php

session_start();
session_destroy();

echo "<script>window.open('mainpage.php','_self')</script>";
