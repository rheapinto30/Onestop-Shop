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

                    <i class="fa fa-dashboard"></i> Dashboard / View Payments

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

                        <i class="fa fa-tags"></i> View Payments

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
                                    <th> No: </th>
                                    <th> Invoice No: </th>
                                    <th> Amount Paid: </th>
                                    <!--<th> Method: </th>
                                    <th> Reference No: </th>
                                    <th> Payment Code: </th>-->
                                    <th> Payment Date: </th>
                                    <th> Delete Payment: </th>
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

                                $get_payments = "select * from payments where admin_id='$admin_id'";

                                $run_payments = mysqli_query($con, $get_payments);

                                while ($row_payments = mysqli_fetch_array($run_payments)) {

                                    $payment_id = $row_payments['payment_id'];

                                    $invoice_no = $row_payments['invoice_no'];

                                    $amount = $row_payments['amount'];

                                    //$payment_mode = $row_payments['payment_mode'];

                                    //$ref_no = $row_payments['ref_no'];

                                    //$code = $row_payments['code'];

                                    $payment_date = $row_payments['payment_date'];

                                    $i++;

                                ?>

                                    <tr>
                                        <!-- tr begin -->
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $invoice_no; ?> </td>
                                        <td> <?php echo $amount; ?></td>
                                        <!--<td> <?php echo $payment_mode; ?> </td>-->
                                        <!--<td> <?php echo $ref_no; ?></td>-->
                                        <!--<td> <?php echo $code; ?> </td>-->
                                        <td> <?php echo $payment_date; ?> </td>
                                        <td>

                                            <a href="admin.php?delete_payment=<?php echo $payment_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

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