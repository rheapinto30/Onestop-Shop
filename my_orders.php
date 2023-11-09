<center>
    <!--  center Begin  -->

    <h1> My Orders </h1>

    <p class="lead"> Your orders on one place</p>

    <p class="text-muted">
        If you have any questions, feel free to <a href="contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>
    </p>
</center><!--  center Finish  -->
<hr>
<div class="table-responsive">
    <!--  table-responsive Begin  -->

    <table class="table table-bordered table-hover">
        <!--  table table-bordered table-hover Begin  -->

        <thead>
            <!--  thead Begin  -->
            <tr>
                <!--  tr Begin  -->
                <th> ON: </th>
                <th> Due Amount: </th>
                <th> Invoice No: </th>
                <th> Product Name: </th>
                <th> Qty: </th>

                <th> Order Date:</th>
                <th> Confirmation Status: </th>
                <th> Status: </th>

            </tr><!--  tr Finish  -->

        </thead><!--  thead Finish  -->

        <tbody>
            <!--  tbody Begin  -->

            <?php

            $customer_session = $_SESSION['customer_email'];

            $get_customer = "select * from customers where customer_email='$customer_session'";

            $run_customer = mysqli_query($con, $get_customer);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_id = $row_customer['customer_id'];

            $get_orders = "select * from pending_orders where customer_id='$customer_id'";

            $run_orders = mysqli_query($con, $get_orders);

            $i = 0;

            while ($row_orders = mysqli_fetch_array($run_orders)) {

                $order_id = $row_orders['order_id'];
                $admin_id = $row_orders['admin_id'];
                $due_amount = $row_orders['due_amount'];
                $invoice_no = $row_orders['invoice_no'];
                $qty = $row_orders['qty'];
                $product_id = $row_orders['product_id'];
                $order_date = substr($row_orders['order_date'], 0, 11);
                $order_status = $row_orders['order_status'];
                $i++;
                if ($order_status == 'pending') {
                    $order_stat = 'Not Confirmed';
                } else {
                    $order_stat = 'Confirmed';
                }
                $get_products = "select * from products where product_id='$product_id'";
                $run_products = mysqli_query($con, $get_products);
                $row_products = mysqli_fetch_array($run_products);
                $product_title = $row_products['product_title'];
            ?>
                <tr>
                    <!--  tr Begin  -->
                    <th> <?php echo $i; ?> </th>
                    <td> Rs <?php echo $due_amount; ?> </td>
                    <td> <?php echo $invoice_no; ?> </td>
                    <td> <?php echo $product_title; ?> </td>
                    <td> <?php echo $qty; ?> </td>
                    <td> <?php echo $order_date; ?> </td>
                    <td> <?php echo $order_stat; ?> </td>
                    <td>
                        <?php
                        if ($order_stat == 'Not Confirmed') { ?>
                            <a href="confirm.php?order_id=<?php echo $order_id; ?>&admin_id=<?php echo $admin_id;  ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Order </a>
                        <?php
                        } else {
                            echo "Done";
                        }
                        ?>
                    </td>
                </tr><!--  tr Finish  -->
            <?php } ?>
        </tbody><!--  tbody Finish  -->

    </table><!--  table table-bordered table-hover Finish  -->

</div><!--  table-responsive Finish  -->