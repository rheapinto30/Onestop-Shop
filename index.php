<?php
include("db.php");
include("header.php");
$active = 'Blog';
//session_start();

if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('sample.php','_self')</script>";
} else {

    //include("db.php");
    //include("function.php");
    include "logic.php";
    $customer_session = $_SESSION['customer_email'];

    $get_cust = "select * from customers where customer_email='$customer_session'";

    $run_cust = mysqli_query($con, $get_cust);

    $row_cust = mysqli_fetch_array($run_cust);

    $cust_id = $row_cust['customer_id'];

    $cust_name = $row_cust['customer_name']

    //$get_customer = "select * from data where customer_id='$customer_id'";
    // $run_customer = mysqli_query($con, $get_customer);
    //$row_customer = mysqli_fetch_array($run_customer);
    //$customer_id = $row_customer['customer_id'];

    //   $customer_name = $row_customer['customer_name'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Blog</title>
    </head>

    <body>

        <div class="container mt-5">

            <?php if (isset($_REQUEST['info'])) { ?>
                <?php if ($_REQUEST['info'] == "added") { ?>
                    <div class="alert alert-success" role="alert">
                        Post has been added.
                    </div>
                <?php } else if ($_REQUEST['info'] == "updated") { ?>
                    <div class="alert alert-success" role="alert">
                        Post has been updated.
                    </div>
                <?php } else if ($_REQUEST['info'] == "deleted") { ?>
                    <div class="alert alert-danger" role="alert">
                        Post has been deleted.
                    </div>
                <?php } ?>
            <?php } ?>

            <div class="text-center">

                <a href="create.php" class="btn btn-primary"> <i class="fas fa-plus"></i> Create new post</a>
            </div>
            <br>
            <div class="row">

                <?php foreach ($query as $q) {
                ?>

                    <div class="panel panel-primary">
                        <div class="panel-heading">Title: <?php echo $q['title']; ?> </div>
                        <!--div class="panel-body"></div>-->
                        <div class="panel-body"> <?php echo $q['content']; ?></div>
                        <div class="panel-footer">Posted on: <?php echo $q['created_at']; ?>
                            by <?php
                                $customer_id = $q['customer_id'];
                                $get_customer = "select * from customers where customer_id='$customer_id'";
                                $run_customer = mysqli_query($con, $get_customer);
                                $row_customer = mysqli_fetch_array($run_customer);
                                $customer_n = $row_customer['customer_name'];
                                echo 'Customer Name: ', $customer_n;
                                $blog_id = $q["id"];
                                echo "Blog Id: " . $blog_id;
                                echo "customer_id" . $customer_id;
                                echo $cust_id;
                                if ($customer_id == $cust_id)
                                    echo "Me";
                                else
                                    echo $customer_n;
                                //echo $customer_name . ' & ' . $cust_name;
                                ?>
                            <br>
                            <!-- <?php
                                    echo ' ID OF BLOG: ' . $blog_id;
                                    ?>
                            <br> -->
                            <?php
                            //$customer_id = writer of blog post & $cust_id = person Logged in
                            //if both match then More options (Edit/Delete) is available to person logged in
                            if ($customer_id == $cust_id) : ?>
                                <a href="view.php?id=<?php echo $blog_id ?>">More Options<span class="text-danger">&rarr;</span></a>
                            <?php endif; ?>
                        </div>

                    </div>


                    <!--<div class="card" style="width: 18rem;">
                            <div class="card text">
                                <div class="card-body">
                                    <h6 class="card-text"><!?php echo $q['created_at']; ?></h6>
                                    <h5 class="card-title"><!?php echo $q['title']; ?></h5>
                                    <p class="card-text"><!?php echo $q['content']; ?></p>
                                    <p class="card-text"><!?php echo $q['customer_id']; ?></p>
                                    <a href="view.php?id=<!?php echo $q['id']; ?>" class=" btn btn-light">Read More<span class="text-danger">&rarr;</span></a>
                                </div>
                            </div>
                        </div>-->

                <?php } ?>
            </div>

        </div>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!--script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>-->

        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->

    </body>

    </html>
<?php
}
?>