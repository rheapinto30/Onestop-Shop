<center>
    <!-- center Begin -->

    <h1> Do You Realy Want To Delete Your Account ? </h1>

    <form action="" method="post">
        <!-- form Begin -->

        <input type="submit" name="Yes" value="Yes, I Want To Delete" class="btn btn-danger">

        <input type="submit" name="No" value="No, I Dont Want To Delete" class="btn btn-primary">

    </form><!-- form Finish -->

</center><!-- center Finish -->


<?php

$admin_email = $_SESSION['admin_email'];

if (isset($_POST['Yes'])) {

    $delete_admin = "delete from admins where admin_email='$admin_email'";

    $run_delete_admin = mysqli_query($con, $delete_admin);

    if ($run_delete_customer) {

        session_destroy();

        echo "<script>alert('Successfully deleted your account.')</script>";

        echo "<script>window.open('mainpage.php','_self')</script>";
    }
}

if (isset($_POST['No'])) {

    echo "<script>window.open('admin.php?view_orders','_self')</script>";
}

?>