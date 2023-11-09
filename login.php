<?php
include("function.php");
$con = new mysqli('localhost', 'root', '', 'n_n_onestopshop');
if ($con->connect_error) {
    die('connection Failed : ' . $con->connect_error);
} else {
    if (isset($_POST['login'])) {

        $customer_email = $_POST['c_email'];

        $customer_pass = $_POST['c_pass'];

        $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

        $run_customer = mysqli_query($con, $select_customer);

        $get_ip = getRealIpUser();

        $check_customer = mysqli_num_rows($run_customer);

        $select_cart = "select * from cart where ip_add='$get_ip'";

        $run_cart = mysqli_query($con, $select_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if ($check_customer == 0) {

            echo "<script>alert('Your email or password is wrong')</script>";

            exit();
        }

        if ($check_customer == 1 and $check_cart == 0) {

            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('You are Logged in')</script>";

            echo "<script>window.open('myaccount.php?my_orders','_self')</script>";
        } else {

            $_SESSION['customer_email'] = $customer_email;

            echo "<script>alert('You are Logged in')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";
        }
    }
}
