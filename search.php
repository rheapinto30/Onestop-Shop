<?php
//include "db.php";
include("header.php");
if (!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('sample.php','_self')</script>";
} else {


?>
    <?php


    $query = $_GET['query'];


    $min_length = 3;


    if (strlen($query) >= $min_length) {

        $query = htmlspecialchars($query);


        $query = mysqli_real_escape_string($con, $query);

        $raw_results = mysqli_query($con, "SELECT * FROM products WHERE (`product_title` LIKE '%" . $query . "%') OR (`product_keywords` LIKE '%" . $query . "%') OR (`product_desc` LIKE '%" . $query . "%')") or die(mysqli_error($con));




        if (mysqli_num_rows($raw_results) > 0) {
            while ($results = mysqli_fetch_array($raw_results)) {

                $pro_id = $results['product_id'];


    ?>

                <div class="row">
                    <!-- row Begin -->
                    <div class="col-md-2">
                        <?php
                        $get_products = "select * from products where product_id = $pro_id ";


                        $run_products = mysqli_query($con, $get_products);

                        while ($row_products = mysqli_fetch_array($run_products)) {

                            $pro_id = $row_products['product_id'];

                            $pro_title = $row_products['product_title'];

                            $pro_price = $row_products['product_price'];

                            $pro_img1 = $row_products['product_img1'];

                            echo "
                                
                                    <div class='col-md-12 col-sm-20 center-responsive'>
                                    
                                        <div class='product'>
                                        
                                            <a href='details.php?pro_id=$pro_id'>
                                            
                                                <img class='img-responsive' src='product_images/$pro_img1'>
                                            
                                            </a>
                                            
                                            <div class='text'>
                                            
                                                <h2>
                                                
                                                    <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                                
                                                </h2>
                                            
                                                <p class='price'>

                                                    Rs. $pro_price

                                                </p>

                                                <p class='buttons'>

                                                    <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                                        View Details

                                                    </a>

                                            </p>
                                            
                                            </div>
                                        
                                        </div>
                                    
                                    </div>
                                
                                ";
                        }

                        ?>

                    </div><!-- row Finish -->



                <?php
            }

                ?>

                </ul><!-- pagination Finish -->
                </center>

                <?php

                //getpcatpro();

                //getcatpro();

                ?>

                </div><!-- col-md-9 Finish -->

                </div><!-- container Finish -->
                </div><!-- #content Finish -->

    <?php

        } else {
            echo "<h1>No Results Found related to '$query'</h1>";
        }
    } else {
        echo "Minimum length is " . $min_length;
    }
}
    ?>

    </div>

    </div><!-- col-md-9 Finish -->

    </div><!-- container Finish -->
    </div><!-- #content Finish -->

    <?php
    include("footer.php");
    ?>

    </table>