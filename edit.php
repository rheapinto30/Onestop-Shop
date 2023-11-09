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
        <!-- Latest compiled and minified CSS 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Blog</title>
    </head>

    <body>
        <div class="container mt-5">
            <?php foreach ($query as $q) {
                if (isset($_REQUEST['id'])) {
                    $id = $_REQUEST['id'];
                    $sql = "SELECT *FROM data WHERE id=$id ";
                    $query = mysqli_query($con, $sql);
                }
                $customer_id = $q['customer_id'];
                $blog_no = $q['id'];
                if ($id == $blog_no) {
            ?>
                    <form method="$_GET">
                        <input type="text" hidden name="id" value="<?php echo $q["id"]; ?>">
                        <input type="text" name="title" placeholder="Blog Title" class="form-control panel-primary text-center" value="<?php echo $q["title"]; ?>">
                        <textarea name="content" class="form-control panel-primary"> <?php echo $q["content"]; ?></textarea>


                        <button name="update" class="btn btn-primary">Update</button>

                    <?php
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
                        $id = $_REQUEST['id'];

                        $sql = "DELETE FROM data WHERE id=$id";
                        $query = mysqli_query($con, $sql);
                        //header("Location:index.php?info=deleted");
                        echo "<script>alert('Blog post has been deleted sucessfully')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                        exit();
                    }
                } ?>


                    <!--<input type="text" hidden name="id" value="<?php echo $q["id"]; ?>">
                                <input type="text" name="title" placeholder="Blog Title" class="form-control bg-dark text-white my-3 text-center" value="<?php echo $q["title"]; ?>">
                                <textarea name="content" class="form-control bg-dark text-white my-3"><?php echo $q["content"]; ?></textarea>
                                <button name="update" class="btn btn-dark">Update</button>-->
                    </form>
                <?php } ?>

        </div>

        <!-- Latest compiled and minified JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->

        <!-- jQuery library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
    </body>

    </html>
<?php
}
// }
?>