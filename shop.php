<?php
include("header.php");
$active = 'Shop';
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
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div class="col-md-3">
            <!-- col-md-3 Begin -->

            <?php

            include("sidebar.php");

            ?>

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9">
            <!-- col-md-9 Begin -->

            <?php

            if (!isset($_GET['p_cat'])) {

                echo "

                       <div class='box'><!-- box Begin -->
                           <h1>Shop</h1>
                           <p>
                               Checkout our wonderful collection
                           </p>
                       </div><!-- box Finish -->

                       ";
            }

            ?>
            <!-- <a class='btn btn-default' href='rough.php'>

                Price Filter

            </a> -->
            <div class="row">
                <!-- row Begin -->
                <!--Pagination starts here mostly maybe-->
                <?php

                if (!isset($_GET['p_cat'])) {
                    if (!isset($_GET['cat'])) {
                        $per_page = 9;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $start_from = ($page - 1) * $per_page;
                        $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                        $run_products = mysqli_query($con, $get_products);
                        while ($row_products = mysqli_fetch_array($run_products)) {

                            $pro_id = $row_products['product_id'];
                            $pro_title = $row_products['product_title'];
                            $pro_price = $row_products['product_price'];
                            $pro_img1 = $row_products['product_img1'];
                            $admin_id = $row_products['admin_id'];
                            $get_admin = "select * from admins where admin_id='$admin_id'";
                            $run_admin = mysqli_query($con, $get_admin);
                            $row_admin = mysqli_fetch_array($run_admin);
                            $admin_name = $row_admin['admin_name'];
                            echo
                            "<div class='col-md-4 col-sm-8 '>  
                                <div class='panel'>
                                    <a href='details.php?pro_id=$pro_id'>
                                    <div class='panel-heading'>
                                    <img class='img-responsive' src='product_images/$pro_img1' style='width: 250px; height:250px'center-responsive>
                                    </div>
                                    <div class='panel-body'>
                                    <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                    <p class='price'>Rs. $pro_price</p>
                                    <p>Sold by: $admin_name</p>
                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>View Details</a>
                                    </div>
                                    </div>
                            </div>";
                        }
                ?>
            </div><!-- row Finish -->

            <center>
                <ul class="pagination">
                    <!-- pagination Begin -->
            <?php
                        $query = "select * from products";
                        $result = mysqli_query($con, $query);
                        $total_records = mysqli_num_rows($result);
                        $total_pages = ceil($total_records / $per_page);
                        echo "                      
                            <li>
                                <a href='shop.php?page=1'> " . 'First Page' . " </a>
                            </li>
                        ";
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "                    
                                <li>
                                    <a href='shop.php?page=" . $i . "'> " . $i . " </a>
                                </li>
                            ";
                        };

                        echo "                       
                            <li>
                                <a href='shop.php?page=$total_pages'> " . 'Last Page' . " </a>
                            </li>
                        ";
                    }
                }
            ?>

                </ul><!-- pagination Finish -->
            </center>

            <?php
            getpcatpro();
            //getcatpro();
            ?>
        </div><!-- col-md-9 Finish -->
    </div><!-- container Finish -->
</div><!-- #content Finish -->

<!---<a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
<!<i class='fa fa-shopping-cart'></i> Add To Cart</a>-->
<?php
include("footer.php");
?>

<!--script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>