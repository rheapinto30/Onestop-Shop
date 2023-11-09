<?php

function getRealIpUser()
{

    switch (true) {

        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}

/// finish getRealIpUser functions ///

/// begin add_cart functions ///

function add_cart()
{

    global $db;

    if (isset($_GET['add_cart'])) {

        $ip_add = getRealIpUser();

        $p_id = $_GET['add_cart'];

        $product_qty = $_POST['product_qty'];

        //$product_size = $_POST['product_size'];

        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

        $run_check = mysqli_query($db, $check_product);

        if (mysqli_num_rows($run_check) > 0) {

            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        } else {

            $query = "insert into cart (p_id,ip_add,qty) values ('$p_id','$ip_add','$product_qty')";

            $run_query = mysqli_query($db, $query);

            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
    }
}

/// finish add_cart functions ///
