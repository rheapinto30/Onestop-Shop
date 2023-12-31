<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('slogin.php','_self')</script>";
} else {

?>

    <div class="row">
        <!-- row 1 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <ol class="breadcrumb">
                <!-- breadcrumb begin -->
                <li class="active">
                    <!-- active begin -->

                    <i class="fa fa-dashboard"></i> Dashboard / View Products

                </li><!-- active finish -->
            </ol><!-- breadcrumb finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 1 finish -->

    <div class="row">
        <!-- row 2 begin -->
        <div class="col-lg-12">
            <!-- col-lg-12 begin -->
            <div class="panel panel-default">
                <!-- panel panel-default begin -->
                <div class="panel-heading">
                    <!-- panel-heading begin -->
                    <h3 class="panel-title">
                        <!-- panel-title begin -->

                        <i class="fa fa-tags"></i> View Products

                    </h3><!-- panel-title finish -->
                </div><!-- panel-heading finish -->

                <div class="panel-body">
                    <!-- panel-body begin -->
                    <div class="table-responsive">
                        <!-- table-responsive begin -->
                        <table class="table table-striped table-bordered table-hover">
                            <!-- table table-striped table-bordered table-hover begin -->

                            <thead>
                                <!-- thead begin -->
                                <tr>
                                    <!-- tr begin -->
                                    <th> Product ID: </th>
                                    <th> Product Title: </th>
                                    <th> Product Image: </th>
                                    <th> Product Price: </th>
                                    <th> Product Sold: </th>
                                    <th> Product Keywords: </th>
                                    <th> Product Date: </th>
                                    <th> Product Delete: </th>
                                    <th> Product Edit: </th>
                                </tr><!-- tr finish -->
                            </thead><!-- thead finish -->

                            <tbody>
                                <!-- tbody begin -->

                                <?php

                                $admin_session = $_SESSION['admin_email'];

                                $get_admin = "select * from admins where admin_email='$admin_session'";

                                $run_admin = mysqli_query($con, $get_admin);

                                $row_admin = mysqli_fetch_array($run_admin);

                                $admin_id = $row_admin['admin_id'];

                                $i = 0;

                                $get_products = "select * from products where admin_id='$admin_id'";

                                $run_products = mysqli_query($con, $get_products);

                                while ($row_products = mysqli_fetch_array($run_products)) {

                                    $pro_id = $row_products['product_id'];

                                    $pro_title = $row_products['product_title'];

                                    $pro_img1 = $row_products['product_img1'];

                                    $pro_price = $row_products['product_price'];

                                    $pro_keywords = $row_products['product_keywords'];

                                    $pro_date = $row_products['date'];

                                    $i++;

                                ?>

                                    <tr>
                                        <!-- tr begin -->
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $pro_title; ?> </td>
                                        <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                                        <td> Rs <?php echo $pro_price; ?> </td>
                                        <td> <?php

                                                $get_sold = "select * from pending_orders where product_id='$pro_id'";

                                                $run_sold = mysqli_query($con, $get_sold);

                                                $count = mysqli_num_rows($run_sold);

                                                echo $count;

                                                ?>
                                        </td>
                                        <td> <?php echo $pro_keywords; ?> </td>
                                        <td> <?php echo $pro_date ?> </td>
                                        <td>

                                            <a href="admin.php?delete_product=<?php echo $pro_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>
                                        <td>

                                            <a href="admin.php?edit_product=<?php echo $pro_id; ?>">

                                                <i class="fa fa-pencil"></i> Edit

                                            </a>

                                        </td>
                                    </tr><!-- tr finish -->

                                <?php } ?>

                            </tbody><!-- tbody finish -->

                        </table><!-- table table-striped table-bordered table-hover finish -->
                    </div><!-- table-responsive finish -->
                </div><!-- panel-body finish -->

            </div><!-- panel panel-default finish -->
        </div><!-- col-lg-12 finish -->
    </div><!-- row 2 finish -->

<?php } ?>