<?php

include("db.php");

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('slogin.php','_self')</script>";
} else {
    $admin_session = $_SESSION['admin_email'];

    $get_admin = "select * from admins where admin_email='$admin_session'";

    $run_admin = mysqli_query($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);

    $admin_id = $row_admin['admin_id'];

    $admin_name = $row_admin['admin_name'];

    $admin_email = $row_admin['admin_email'];

    $admin_country = $row_admin['admin_country'];

    //$admin_city = $row_admin['admin_city'];

    $admin_contact = $row_admin['admin_contact'];

    $admin_job = $row_admin['admin_job'];

    $admin_image = $row_admin['admin_image'];

    $admin_about = $row_admin['admin_about'];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Insert Products </title>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />-->
        <!------------------------------------------NEW CHANGES --------------------------------------------------->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="style.css" />-->
    </head>

    <body>

        <div class="row">
            <!-- row Begin -->

            <div class="col-lg-12">
                <!-- col-lg-12 Begin -->

                <ol class="breadcrumb">
                    <!-- breadcrumb Begin -->

                    <li class="active">
                        <!-- active Begin -->

                        <i class="fa fa-dashboard"></i> Dashboard / Insert Products

                    </li><!-- active Finish -->

                </ol><!-- breadcrumb Finish -->

            </div><!-- col-lg-12 Finish -->

        </div><!-- row Finish -->

        <div class="row">
            <!-- row Begin -->

            <div class="col-lg-12">
                <!-- col-lg-12 Begin -->

                <div class="panel panel-default">
                    <!-- panel panel-default Begin -->

                    <div class="panel-heading">
                        <!-- panel-heading Begin -->

                        <h3 class="panel-title">
                            <!-- panel-title Begin -->

                            <i class="fa fa-money fa-fw"></i> Insert Product

                        </h3><!-- panel-title Finish -->

                    </div> <!-- panel-heading Finish -->

                    <div class="panel-body">
                        <!-- panel-body Begin -->

                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <!-- form-horizontal Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Product Title </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="product_title" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Product Category </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <select name="product_cat" class="form-control">
                                        <!-- form-control Begin -->

                                        <option> Select a Category Product </option>

                                        <?php

                                        $get_p_cats = "select * from product_categories";
                                        $run_p_cats = mysqli_query($con, $get_p_cats);

                                        while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                                            $p_cat_id = $row_p_cats['p_cat_id'];
                                            $p_cat_title = $row_p_cats['p_cat_title'];

                                            echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                        }

                                        ?>

                                    </select><!-- form-control Finish -->

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <!--div class="form-group">
                                <!-- form-group Begin -->

                            <!--label class="col-md-3 control-label"> Category </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                            <!--select name="cat" class="form-control">
                                        <!-- form-control Begin -->

                            <!--option> Select a Category </option>

                                        <!?php

                                        $get_cat = "select * from categories";
                                        $run_cat = mysqli_query($con, $get_cat);

                                        while ($row_cat = mysqli_fetch_array($run_cat)) {

                                            $cat_id = $row_cat['cat_id'];
                                            $cat_title = $row_cat['cat_title'];

                                            echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                        }

                                        ?-->

                            <!--/select><!-- form-control Finish -->

                            <!--/div><!-- col-md-6 Finish -->

                            <!--/div-->
                            <!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Product Image </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="product_img1" type="file" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Product Price </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="product_price" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Product Keywords </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="product_keywords" type="text" class="form-control" required>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"> Product Desc </label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label class="col-md-3 control-label"></label>

                                <div class="col-md-6">
                                    <!-- col-md-6 Begin -->

                                    <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">

                                </div><!-- col-md-6 Finish -->

                            </div><!-- form-group Finish -->

                        </form><!-- form-horizontal Finish -->

                    </div><!-- panel-body Finish -->

                </div><!-- canel panel-default Finish -->

            </div><!-- col-lg-12 Finish -->

        </div><!-- row Finish -->
        <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->


        <!------------------------------------------NEW CHANGES --------------------------------------------------->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>

    </html>


    <?php

    if (isset($_GET['admin_id'])) {

        $admin_id = $_GET['admin_id'];
    }
    if (isset($_POST['submit'])) {

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        //$cat_id = $_POST['cat_id'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];

        $product_img1 = $_FILES['product_img1']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];

        move_uploaded_file($temp_name1, "product_images/$product_img1");

        $insert_product = "insert into products (admin_id,p_cat_id,date,product_title,product_img1,product_price,product_keywords,product_desc) values ('$admin_id','$product_cat',NOW(),'$product_title','$product_img1','$product_price','$product_keywords','$product_desc')";

        $run_product = mysqli_query($con, $insert_product);

        if ($run_product) {

            echo "<script>alert('Product has been inserted sucessfully')</script>";
            echo "<script>window.open('admin.php','_self')</script>";
        }
    }

    ?>
<?php
}
?>
<!---->