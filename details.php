<?php

$active = 'Cart';
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
                    Shop
                </li>

                <li>
                    <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                </li>
                <li> <?php echo $pro_title; ?> </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <?php

            include("sidebar.php");

            ?>

        </div><!-- col-md-3 Finish -->
        <div>
            <div class="col-md-9">
                <!-- col-md-9 Begin -->
                <div id="productMain" class="row">
                    <!-- row Begin -->
                    <div class="col-sm-6" style="background-color:white;">
                        <!-- col-sm-6 Begin -->
                        <div id="mainImage" style="margin-top:15px; margin-bottom: 15px;">
                            <!-- #mainImage Begin -->
                            <center>
                                <img class="img-responsive" src="product_images/<?php echo $pro_img1; ?>" alt="Product 3-a" style="width:300px; height:300px;">
                            </center>
                        </div><!-- mainImage Finish -->
                    </div><!-- col-sm-6 Finish -->

                    <div class="col-sm-6">
                        <!-- col-sm-6 Begin -->
                        <div class="box">
                            <!-- box Begin -->
                            <h1 class="text-center">
                                <?php echo $pro_title; ?>
                            </h1>

                            <form class="form-horizontal" method="post">
                                <!-- form-horizontal Begin -->
                                <div class="form-group">
                                    <!-- form-group Begin -->
                                    <label for="" class="col-md-5 control-label">Products Quantity</label>
                                    <div class="col-md-7">
                                        <!-- col-md-7 Begin -->
                                        <select name="product_qty" id="" class="form-control">
                                            <!-- select Begin -->
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select><!-- select Finish -->
                                    </div><!-- col-md-7 Finish -->
                                    <label for="price" class="col-md-5 control-label">Product Price: </label>
                                    <p id="price">Rs <?php echo $pro_price; ?></p>
                                    <!--Sold By-->
                                    <label class="col-md-5 control-label">Sold by:</label>
                                    <h3> <?php echo $admin_name; ?></h3>
                                    <br>

                                    <div class="col-sm-15">
                                        <p class="text-center buttons"><button type="submit" name="add_cart" class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></a></p>
                                    </div>
                            </form><!-- form-horizontal Finish -->
                            <?php
                            if (isset($_POST['add_cart'])) {

                                $ip_add = getRealIpUser();
                                $pro_id = $_GET['pro_id'];
                                $customer_email = $_SESSION['customer_email'];

                                $p_id = $pro_id;

                                $check_admin = "select admin_id from products where product_id = '$pro_id'";

                                $run_check = mysqli_query($con, $check_admin);

                                while ($row_products = mysqli_fetch_array($run_check)) {
                                    $admin_id = $row_products['admin_id'];
                                }

                                $product_qty = $_POST['product_qty'];

                                $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

                                $run_check = mysqli_query($con, $check_product);

                                if (mysqli_num_rows($run_check) > 0) {

                                    if (empty($_SESSION['customer_email'])) {
                                        echo "<script>alert('Please login');</script>";
                                        echo "<script>window.open('customer_login.php','_self')</script>";
                                    } // product already exists in cart -> hence increment its count in cart
                                    else {
                                        //$new_qty = qty+ $product_qty;
                                        $query = "update cart set qty = qty + '$product_qty' WHERE customer_email = '$customer_email' AND p_id='$p_id'";
                                        echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                                        $run_query = mysqli_query($con, $query);
                                        // echo "<script>alert('This product has already added in cart')</script>";
                                        // echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                                    }
                                } else {

                                    $query = "insert into cart (p_id,admin_id,ip_add,qty,customer_email) values ('$p_id','$admin_id','$ip_add','$product_qty','$customer_email')";

                                    $run_query = mysqli_query($con, $query);

                                    echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
                                }
                            }
                            ?>
                        </div><!-- box Finish -->

                        <div class="row" id="thumbs">
                            <!-- row Begin -->

                            <div class="col-xs-4">
                                <!-- col-xs-4 Begin -->
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
                                    <!-- thumb Begin -->
                                    <!--<img src="product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">-->
                                </a><!-- thumb Finish -->
                            </div><!-- col-xs-4 Finish -->

                        </div><!-- row Finish -->

                    </div><!-- col-sm-6 Finish -->
                </div>
            </div><!-- row Finish -->
            <div class="row">
                <br>
            </div>
            <!---->


        </div>
    </div>

    <div class="col-sm-12">
        <div class="box" id="details" style="padding-top:15px; padding-bottom:15px; padding-left:20px;padding-right:20px;">
            <!-- box Begin -->
            <h3>Product Details:</h3>
            <p>
                <?php echo $pro_desc; ?>
            </p>
        </div><!-- box Finish -->
    </div>

    <div class="col-md-10">
        <!-- <div class="thumbnail"> -->
        <div class="row" style="margin-right: 0px; margin-left: 0px;">
            <div class="box col-sm-6">
                <img class="img-responsive" src="http://placehold.it/750x600" alt="" />
                <!--<div class="thumbnails row">
                        <div class="col-xs-3">
                            <a href="#"><img src="http://placehold.it/750x600" alt="" class="img-thumbnail img-responsive" /></a>
                        </div>
                        <div class="col-xs-3">
                        </div>
                        <div class="col-xs-3">
                            <a href="#"><img src="http://placehold.it/750x600" alt="" class="img-thumbnail img-responsive" /></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#"><img src="http://placehold.it/750x600" alt="" class="imgthumbnail img-responsive" /></a>
                        </div>
                    </div>-->
            </div>
            <div class="box col-sm-6" style="text-align: center;">
                <h2><?php echo $pro_title; ?></h2>
                <div>
                    <label for="price">Product Price:</label>
                    <span id=" price" class="price"><?php echo $pro_price; ?></span>
                </div>
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.
                </div>

                <form role="form">
                    <div class="number form-group">
                        <label class="control-label" for="number">Number</ label>
                            <input type="number" class="form-control input-sm" id="number" />
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <select id="color">
                            <option name="color">Blue</option>
                            <option name="color">Green</option>
                            <option name="color">Red</option>
                            <option name="color">Yellow</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btndefault">Contact Seller</button>
                        <button type="submit" class="btn btn-success">Add to
                            Cart</button>
                    </div>
                </form>
            </div>
        </div>




        <div class="col-sm-12">
            <div id="details" style="background-color:beige;padding-top:10px; padding-bottom:10px; padding-left:5px;padding-right:5px; margin-bottom:10px; margin-top:10px;">
                <!-- box Begin -->
                <b>
                    <h2 style="margin-top:10px;">Other Products you must Like:</h2>
                </b>
            </div><!-- box Finish -->
        </div>
        <div id="row same-height-row">
            <!-- #row same-heigh-row Begin -->

            <?php

            $get_products = "select * from products order by rand() LIMIT 0,4";
            $run_products = mysqli_query($con, $get_products);
            while ($row_products = mysqli_fetch_array($run_products)) {
                $admin_id = $row_products['admin_id'];
                $pro_id = $row_products['product_id'];
                $pro_title = $row_products['product_title'];
                $pro_img1 = $row_products['product_img1'];
                $pro_price = $row_products['product_price'];
                echo
                "<div class='col-md-3 col-sm-6 center-responsive'>    
                    <div class='product same-height'>                            
                        <a href='details.php?pro_id=$pro_id'>
                            <img class='img-responsive' src='product_images/$pro_img1'>
                        </a>                                
                        <div class='text'>
                            <h3> <a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>
                            <p class='price'> Rs $pro_price </p>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
        </div><!-- #row same-heigh-row Finish -->
        <!-- </div>col-md-9 Finish -->
    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("footer.php");

?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>

</html>