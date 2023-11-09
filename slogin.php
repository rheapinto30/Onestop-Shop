<?php

session_start();
include("db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>One Stop shop</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="slogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body <div class="container">
    <!-- container begin -->
    <form action="" class="form-login" method="post">
        <!-- form-login begin -->
        <h2 class="form-login-heading"> Seller Login </h2>

        <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>

        <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>

        <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">
            <!-- btn btn-lg btn-primary btn-block begin -->

            Login

        </button><!-- btn btn-lg btn-primary btn-block finish -->
        <?php

        echo "Not yet Registered? then click <a href ='insert_user.php'>Sign up </a> <br>OR<br> Go Back to Main Page";

        ?>


        <!--i class="fa fa-home"-->
        <a href="mainpage.php"><i class="fa fa-home" aria-hidden="true"></i></a>
        <!--/i-->


    </form><!-- form-login finish -->
    </div><!-- container finish -->

</body>

</html>


<?php

if (isset($_POST['admin_login'])) {

    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);

    $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

    $run_admin = mysqli_query($con, $get_admin);

    $count = mysqli_num_rows($run_admin);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($run_admin);
        $_SESSION['admin_email'] = $admin_email;
        //$_SESSION['ADMIN_ROLE'] = $row['role'];

        echo "<script>alert('Logged in. Welcome Back')</script>";

        echo "<script>window.open('admin.php','_self')</script>";
    } else {

        echo "<script>alert('Email or Password is Wrong !')</script>";
    }
}

?>