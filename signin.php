

<?php
include("function.php");
$con = new mysqli('localhost', 'root', '', 'n_onestopshop');
if ($con->connect_error) {
    die('connection Failed : ' . $con->connect_error);
} else {
    if (isset($_POST['register'])) {
        $c_name = $_POST['c_name'];

        $c_email = $_POST['c_email'];

        $c_pass = $_POST['c_pass'];

        $c_contact = $_POST['c_contact'];

        $c_address = $_POST['c_address'];

        /*$c_image = $_FILES['c_image']['name'];

        $c_image_tmp = $_FILES['c_image']['tmp_name'];

        move_uploaded_file($c_image_tmp, "custom/customer_images/$c_image");*/
        $c_ip = getRealIpUser();


        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_contact,customer_address,customer_ip) values ('$c_name','$c_email','$c_pass','$c_contact','$c_address','$c_ip')";

        $run_customer = mysqli_query($con, $insert_customer);

        $sel_cart = "select * from cart where ip_add='$c_ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);


        if ($check_cart > 0) {

            /// If register have items in cart ///

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You have been Registered Sucessfully')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";
        } else {

            /// If register without items in cart ///

            $_SESSION['customer_email'] = $c_email;

            echo "<script>alert('You have been Registered Sucessfully')</script>";

            echo "<script>window.open('sample.php','_self')</script>";
        }
    }
}
