<?php
include("header.php");
//session_start();

if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('checkout.php','_self')</script>";
} else {
    include("db.php");
?>

    <!--navbar default end-->
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

                    <?php

                    if (isset($_GET['my_orders'])) {
                        include("my_orders.php");
                    }

                    ?>

                    <?php

                    if (isset($_GET['pay_offline'])) {
                        include("pay_offline.php");
                    }

                    ?>

                    <?php

                    if (isset($_GET['edit_account'])) {
                        include("edit_account.php");
                    }

                    ?>

                    <?php

                    if (isset($_GET['change_pass'])) {
                        include("change_pass.php");
                    }

                    ?>

                    <?php

                    if (isset($_GET['delete_account'])) {
                        include("delete_account.php");
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