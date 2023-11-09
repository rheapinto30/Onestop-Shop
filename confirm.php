<?php
include("header.php");


if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('checkout.php','_self')</script>";
} else {

    //session_start();

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
        $check_admin = "select * from pending_orders where order_id ='$order_id'";

        $run_check = mysqli_query($con, $check_admin);

        while ($row_products = mysqli_fetch_array($run_check)) {
            //$order_id = $row_products['order_id'];
            $admin_id = $row_products['admin_id'];
            $am = $row_products['due_amount'];
            $invoice = $row_products['invoice_no'];
        }
    }
?>

    <!DOCTYPE html>
    <html>

    <head>

        <!---->
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
                            My Account
                        </li>
                    </ul><!-- breadcrumb Finish -->

                </div><!-- col-md-12 Finish -->

                <div class="col-md-3">
                    <!-- col-md-3 Begin -->

                    <?php

                    include("accountsidebar.php");

                    ?>

                </div><!-- col-md-3 Finish -->

                <div class="col-md-9">
                    <!-- col-md-9 Begin -->

                    <div class="box">
                        <!-- box Begin -->

                        <h1 align="center"> Please confirm your order</h1>

                        <form action="confirm.php?update_id=<?php echo $order_id; ?>&admin_id=<?php echo $admin_id; ?>" method="post" enctype="multipart/form-data">
                            <!-- form Begin -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label> Invoice No: </label>

                                <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice; ?>" required>

                            </div><!-- form-group Finish -->

                            <div class=" form-group">
                                <!-- form-group Begin -->

                                <label> Amount Sent: </label>

                                <input type="text" class="form-control" name="amount_sent" value="<?php echo $am; ?>" required>

                            </div><!-- form-group Finish -->

                            <div class=" form-group">
                                <!-- form-group Begin -->

                                <label> Address: </label>
                                <!--textarea name="address" cols="19" rows="6" class="form-control"></textarea-->
                                <input type="text" class="form-control" name="address" required>
                            </div><!-- form-group Finish -->

                            <div class="form-group">
                                <!-- form-group Begin -->

                                <label> Payment Date: </label>

                                <input type="date" class="form-control" name="date" required>

                            </div><!-- form-group Finish -->

                            <div class="text-center">
                                <!-- text-center Begin -->


                                <button class="btn btn-primary btn-lg" name="confirm_payment">
                                    <!-- tn btn-primary btn-lg Begin -->

                                    <!--i class="fa fa-user-md"></i--> Confirm Payment

                                </button><!-- tn btn-primary btn-lg Finish -->


                            </div><!-- text-center Finish -->

                        </form><!-- form Finish -->

                        <?php

                        if (isset($_POST['confirm_payment'])) {

                            $update_id = $_GET['update_id'];
                            $admin_id = $_GET['admin_id'];
                            //$order_id = $_GET['order_id'];
                            //$get_admin1 = "select * from customer_orders where order_id = '$order_id'";

                            // $run_check1 = mysqli_query($con, $check_admin1);
                            //while ($row_admin1 = mysqli_fetch_array($run_check1)) {

                            //   $admin_id = $row_admin1['admin_id'];
                            // }
                            $invoice_no = $_POST['invoice_no'];

                            $amount = $_POST['amount_sent'];

                            //$payment_mode = $_POST['payment_mode'];
                            $address = $_POST['address'];
                            //$ref_no = $_POST['ref_no'];
                            //$admin_id = "select * from products where admin_id='$update_id'";
                            //$code = $_POST['code'];

                            $payment_date = $_POST['date'];

                            $complete = "Complete";

                            $insert_payment = "insert into payments (admin_id,invoice_no,amount,address,payment_date) values ('$admin_id','$invoice_no','$amount','$address','$payment_date')";

                            $run_payment = mysqli_query($con, $insert_payment);

                            $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                            $run_customer_order = mysqli_query($con, $update_customer_order);

                            $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                            $run_pending_order = mysqli_query($con, $update_pending_order);

                            if ($run_pending_order) {

                                //echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 working hours')</script>";
                                echo "<script>window.open('myaccount.php?my_orders','_self')</script>";
                            }
                        }

                        ?>

                    </div><!-- box Finish -->

                </div><!-- col-md-9 Finish -->

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
<?php
}

?>