<?php

session_start();
include("db.php");
include("function.php");
?>
<?php

if (isset($_GET['pro_id'])) {

    $product_id = $_GET['pro_id'];

    $get_product = "select * from products where product_id='$product_id'";

    $run_product = mysqli_query($con, $get_product);

    $row_product = mysqli_fetch_array($run_product);

    $p_cat_id = $row_product['p_cat_id'];

    $pro_title = $row_product['product_title'];

    $pro_price = $row_product['product_price'];

    $pro_desc = $row_product['product_desc'];

    $admin_id = $row_product['admin_id'];

    $pro_img1 = $row_product['product_img1'];

    // $pro_img2 = $row_product['product_img2'];

    //$pro_img3 = $row_product['product_img3'];

    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

    $run_p_cat = mysqli_query($con, $get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);

    $p_cat_title = $row_p_cat['p_cat_title'];

    $get_admin = "select * from admins where admin_id='$admin_id'";

    $run_admin = mysqli_query($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);

    $admin_name = $row_admin['admin_name'];
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>One-Stop Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div id="top">
        <!--Top bar start-->
        <div class=" container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        echo "Welcome: Guest";
                    } else {
                        echo "Welcome: " . $_SESSION['customer_email'] . "";
                    }
                    ?>
                </a>
                <!---<a href="#">
                    p Total Price: INR 100, Total Items 2</a>-->
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="mainpage.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="customer_registration.php"> Register </a>
                    </li>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {

                            echo "<a href='customer_login.php'>My Account</a>";
                        } else {

                            echo "<a href='myaccount.php?my_orders'>My Account</a>";
                        }
                        ?>
                        <!--<a href="myaccount.php"> My Account </a>-->
                    </li>
                    <!--<li>
                        <a href="cart.php"> Goto Cart </a>
                    </li>-->
                    <li>
                        <a href="customer_login.php"> Login</a>
                    </li>
                    <li>
                        <a href="checkout.php">
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'></a>";
                            } else {
                                echo " <a href='logout.php'> Log Out </a> ";
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!--Top bar end-->
    <div class="navbar navbar-default" id="navbar">
        <!--navbar start-->
        <div class="container">
            <div class="navbar-header">
                <!--navbar header start-->
                <a class="navbar-brand home" href="sample.php">
                    <img src="IMAGES/logo.svg" width="250" height="50" alt="OneStop Shop" class="hidden-xs">
                    <!-- <img src="images/logo.-small.jpg" alt="OneStop Shop" class="vissible-xs">-->
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <!--navbar header start-->
            <div class="navbar-collapse" id="navigation">
                <!--navbar-collapse collapse start-->
                <div class="padding-nav">
                    <!--padding-nav start-->
                    <ul class="nav navbar-nav navbar-left">
                        <!-- PHP code to handle active state -->
                        <li class="<?php if ($active == 'Home') echo "active"; ?>">
                            <a href="sample.php">Home</a>
                        </li>
                        <li class="<?php if ($active == 'Shop') echo "active"; ?>">
                            <div class="dropdown">
                                <a href="shop.php"><button class="dropbtn">
                                        SHOP</button></a>
                                <div class="dropdown-content">
                                    <a href="hairaccessories.php">Hair Accessories</a>
                                    <a href="art.php">Art</a>
                                    <a href="skincare.php">Skincare</a>
                                    <a href="candles.php">Scented Candles</a>

                                </div>
                            </div>
                        </li>
                        <li class="<?php if ($active == 'Account') echo "active"; ?>">
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='customer_login.php'>My Account</a>";
                            } else {
                                echo "<a href='myaccount.php?my_orders'>My Account</a>";
                            }
                            ?>
                        </li>
                        <li class="<?php if ($active == 'Blog') echo "active"; ?>">
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='customer_login.php'>Blog</a>";
                            } else {
                                echo "<a href='index.php'>Blog</a>";
                            }
                            ?>
                        </li>
                        <li class="<?php if ($active == 'Contact') echo "active"; ?>">
                            <a href="contact.php">Contact Us</a>
                        </li>
                    </ul>

                </div>
                <!--padding-nav end-->
                <div class="navbar-collapse collapse right end">
                    <a href="cart.php" class="btn btn-primary navbar-btn">
                        <i class="fa fa-shopping-cart"></i>
                        <!-- PHP code to handle cart items -->
                        <span>
                            <?php
                            $no_of_items = items();
                            // echo $no_of_items
                            if ($no_of_items == 1)
                                echo $no_of_items . ' Item';
                            else
                                echo $no_of_items . ' Items';
                            ?>
                            in Cart</span>
                        <!-- <span> < ?php $no_of_items = items(); ?> Item(s) in Cart</span> -->
                    </a>
                    <button class="btn navbar-btn btn-primary navbar-right" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="navbar-collapse collapse right end">
                    <div class="collapse clearfix" id="search">
                        <form class="navbar-form" method="GET" action="search.php">
                            <div class="input-group">
                                <input type="text" name="query" placeholder="Search here" class="form-control" required="">
                                <span class="input-group-btn">
                                    <button type="submit" value="query" name="search" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--navbar-collapse collapse end-->
        </div>
    </div>
    <!--navbar default end-->