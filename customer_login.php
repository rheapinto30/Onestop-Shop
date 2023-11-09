<?php
include("header.php");

?>

<div id="content">
    <!-- #content Begin -->
    <div class="container">
        <!-- container Begin -->
        <div class="col-md-12">
            <!-- col-md-12 Begin -->

            <ul class="breadcrumb">
                <!-- breadcrumb Begin -->
                <li>
                    <a href="sample.php">Home</a>
                </li>
                <li>
                    Login
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <?php

            include("sidebar.php");

            ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9">
            <div class="box">
                <!-- box Begin -->

                <div class="box-header">
                    <!-- box-header Begin -->

                    <center>
                        <!-- center Begin -->

                        <h1> Login </h1>

                        <!--p class="lead"> Already have our account..? </p-->

                        <p class="text-muted">Welcome Back! Checkout our amazing products.</p>

                    </center><!-- center Finish -->

                </div><!-- box-header Finish -->

                <form method="post" action="customer_login.php">
                    <!-- form Begin -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label> Email </label>

                        <input name="c_email" type="email" class="form-control" required>

                    </div><!-- form-group Finish -->

                    <div class="form-group">
                        <!-- form-group Begin -->

                        <label> Password </label>

                        <input name="c_pass" type="password" class="form-control" required>

                    </div><!-- form-group Finish -->

                    <div class="text-center">
                        <!-- text-center Begin -->

                        <button name="login" value="Login" class="btn btn-primary">

                            <i class="fa fa-sign-in"></i> Login

                        </button>

                    </div><!-- text-center Finish -->
            </div>
            </form><!-- form Finish -->

            <center>
                <!-- center Begin -->

                <a href="customer_registration.php">

                    <h3> Dont have account..? Register here </h3>

                </a>

            </center><!-- center Finish -->

        </div><!-- box Finish -->


        <?php

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

                echo "<script>window.open('myaccount.php?my_orders','_self')</script>";
            }
        }

        ?>