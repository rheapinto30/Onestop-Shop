<?php
include("db.php");
include("header.php");
if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('sample.php','_self')</script>";
} else {
    include "logic.php";
    $customer_session = $_SESSION['customer_email'];

    $get_cust = "select * from customers where customer_email='$customer_session'";

    $run_cust = mysqli_query($con, $get_cust);

    $row_cust = mysqli_fetch_array($run_cust);

    $cust_id = $row_cust['customer_id'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Blog</title>
    </head>

    <body>

        <!--div class="container mt-5">-->
        <?php foreach ($query as $q) {

            if (isset($_REQUEST['id'])) {
                $blog_id = $_REQUEST['id'];
                //echo 'URL:' . $blog_id;
                $sql = "SELECT *FROM data WHERE id=$blog_id ";
                $query = mysqli_query($con, $sql);
            }

            $cust_blog_id = $q['id'];

            //echo ' Blog no in DB:.' . $cust_blog_id;

            //'cust_id (person Logged in):' -> $cust_id . '  blog_no:' -> $cust_blog_id;

            //echo 'cust_id (person Logged in):' . $cust_id . '  blog_no:' . $cust_blog_id;
            //echo '<br>';
            // $blog_id = $id;
            // echo " customer id: " . $customer_id;
            // echo " blog_id: " . $blog_id;
            // blog_id = ID comes from URL & blog_no = ID comes from 
            if ($blog_id == $cust_blog_id) {
        ?>
                <!-- <div style="background-color: red;">
                    <?php
                    //echo $q['id'];
                    ?>
                </div> -->
                <!--For Edit.php -->
                <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
                <div class="panel panel-primary text-centre">
                    <div class="panel-heading">Title: <?php echo $q['title']; ?> </div>
                    <!--div class="panel-body"></div>-->
                    <div class="panel-body "> <?php echo $q['content']; ?></div>
                    <div class="panel-body">
                        <a href="edit.php?id=<?php echo $q['id']; ?>" class="btn btn-primary navbar-btn right">Edit</a>

                        <a href="view.php?delete=<?php echo $q['id']; ?>" class="btn btn-primary navbar-btn right" name="delete">Delete</a>
                    </div>
                    <div class="panel-footer">Created at:
                        <?php echo $q['created_at']; ?>
                        <br>
                    <?php
                    if ($blog_id == $cust_blog_id) {
                        if (isset($_REQUEST['update'])) {
                            $id = $_REQUEST['id'];
                            $title = $_REQUEST["title"];
                            $content = $_REQUEST["content"];
                            $sql = "UPDATE data SET title='$title',content='$content' WHERE id=$id";
                            mysqli_query($con, $sql);
                            //header("Location:index?info=updated");
                            echo "<script>alert('Blog post has been updated sucessfully')</script>";
                            echo "<script>window.open('index.php','_self')</script>";
                            exit();
                        }
                        if (isset($_REQUEST['delete'])) {
                            $id = $q['id'];
                            $delete_blog = "delete from data where id=$id";
                            $run_delete = mysqli_query($con, $delete_blog);
                            if ($run_delete) {
                                echo "<script>alert('Your blog has been Deleted')</script>";
                                echo "<script>window.open('index.php','_self')</script>";
                            }
                            exit();
                        }
                    }
                }
                    ?>

                <?php
            }
                ?>


                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    </body>

    </html>
<?php
}
?>




<!--/div>-->

<!-- Latest compiled and minified JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

<!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->

<!-- jQuery library -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<!-- Latest compiled JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->