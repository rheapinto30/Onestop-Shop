<?php
//if (!isset($_SESSION['customer_email'])) {

// echo "<script>window.open('checkout.php','_self')</script>";
//} else {
include("db.php");
include("function.php");
//include("header.php");

?>

<?php

if (isset($_GET['c_id'])) {

    $customer_id = $_GET['c_id'];
}
$ip_add = getRealIpUser();

$status = "pending";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con, $select_cart);

while ($row_cart = mysqli_fetch_array($run_cart)) {

    $pro_id = $row_cart['p_id'];

    $pro_qty = $row_cart['qty'];
    $admin_id = $row_cart['admin_id'];

    $get_products = "select * from products where product_id='$pro_id'";

    $run_products = mysqli_query($con, $get_products);


    //$admin_id = "select * from products where admin_id='$admin_id'";
    //$admin_id = $_GET['admin_id'];
    while ($row_products = mysqli_fetch_array($run_products)) {

        $sub_total = $row_products['product_price'] * $pro_qty;

        $insert_customer_order = "insert into customer_orders (customer_id,admin_id,due_amount,invoice_no,qty,order_date,order_status) values ('$customer_id','$admin_id','$sub_total','$invoice_no','$pro_qty',NOW(),'$status')";

        $run_customer_order = mysqli_query($con, $insert_customer_order);

        $insert_pending_order = "insert into pending_orders (customer_id,admin_id,invoice_no,product_id,qty,order_status,due_amount,order_date) values ('$customer_id','$admin_id','$invoice_no','$pro_id','$pro_qty','$status','$sub_total',NOW())";

        $run_pending_order = mysqli_query($con, $insert_pending_order);

        $delete_cart = "delete from cart where ip_add='$ip_add'";

        $run_delete = mysqli_query($con, $delete_cart);

        echo "<script>alert('Your orders has been submitted, Thanks')</script>";

        echo "<script>window.open('myaccount.php?my_orders','_self')</script>";
    }
}

?>