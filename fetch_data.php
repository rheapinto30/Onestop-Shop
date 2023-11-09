<?php
include('db.php');
if (isset($_POST["action"])) {
    $query = $con->query("SELECT * FROM products");
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) {
        $query = $con->query("SELECT * FROM products WHERE product_price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] . "'");
    }
    $total_row = mysqli_num_rows($query);
    $output = '';
    if ($total_row > 0) {
        while ($row = $query->fetch_object()) {
            $output .= '
            <div class="col-sm-4 col-lg-3 col-md-3">
                <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:320px;">
                    <img src="product_images/' . $row->product_img1 . '" alt="demo" class="img-responsive" >
                    <p align="center"><strong><a href="details.php" >' . $row->product_title . '</a></strong></p>
                     <h3 style="text-align:center;" class="text" >' . $row->product_price . '</h3>
                </div>
            </div>';
        }
    } else {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}
