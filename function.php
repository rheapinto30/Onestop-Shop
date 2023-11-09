<?php
$db = mysqli_connect("localhost", "root", "", "n_onestopshop");
/// begin getRealIpUser functions ///


function getRealIpUser()
{
    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}

/// finish getRealIpUser functions ///




/// begin getPro functions ///

function getPro()
{

    global $db;

    $get_products = "select * from products order by 1 DESC LIMIT 0,8";

    $run_products = mysqli_query($db, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

        $pro_id = $row_products['product_id'];
        $admin_id = $row_products['admin_id'];
        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];

        $pro_img1 = $row_products['product_img1'];

        echo "
        
        <div class='col-md-4 col-sm-6 single'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        $ $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                        
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
        
        ";
    }
}

/// finish getPro functions ///

/// begin getPCats functions ///

function getPCats()
{

    global $db;

    $get_p_cats = "select * from product_categories";

    $run_p_cats = mysqli_query($db, $get_p_cats);

    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

        $p_cat_id = $row_p_cats['p_cat_id'];

        $p_cat_title = $row_p_cats['p_cat_title'];

        echo "
        
            <li>
            
                <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
            
            </li>
        
        ";
    }
}

/// finish getPCats functions ///

/// begin getCats functions ///

function getCats()
{

    global $db;

    $get_cats = "select * from categories";

    $run_cats = mysqli_query($db, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)) {

        $cat_id = $row_cats['cat_id'];

        $cat_title = $row_cats['cat_title'];

        echo "
        
            <li>
            
                <a href='shop.php?cat=$cat_id'> $cat_title </a>
            
            </li>
        
        ";
    }
}

/// finish getCats functions ///

/// begin getpcatpro functions ///

function getpcatpro()
{

    global $db;

    if (isset($_GET['p_cat'])) {

        $p_cat_id = $_GET['p_cat'];

        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

        $run_p_cat = mysqli_query($db, $get_p_cat);

        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];

        $p_cat_desc = $row_p_cat['p_cat_desc'];

        $get_products = "select * from products where p_cat_id='$p_cat_id'";

        $run_products = mysqli_query($db, $get_products);

        $count = mysqli_num_rows($run_products);

        if ($count == 0) {

            echo "
            
                <div class='box'>
                
                    <h1> No Product Found In This Product Categories </h1>
                
                </div>
            
            ";
        } else {

            echo "
            
                <div class='box'>
                
                    <h1> $p_cat_title </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
            ";
        }

        while ($row_products = mysqli_fetch_array($run_products)) {

            $pro_id = $row_products['product_id'];
            $admin_id = $row_products['admin_id'];
            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];

            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        Rs $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                        </a>
                    
                     
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
            
            ";
        }
    }
}

/// finish getpcatpro functions ///

/// begin getcatpro functions ///

function getcatpro()
{

    global $db;

    if (isset($_GET['cat'])) {

        $cat_id = $_GET['cat'];

        $get_cat = "select * from categories where cat_id='$cat_id'";

        $run_cat = mysqli_query($db, $get_cat);

        $row_cat = mysqli_fetch_array($run_cat);

        $cat_title = $row_cat['cat_title'];

        $cat_desc = $row_cat['cat_desc'];

        $get_cat = "select * from products where cat_id='$cat_id'";

        $run_products = mysqli_query($db, $get_cat);

        $count = mysqli_num_rows($run_products);

        if ($count == 0) {


            echo "
            
                <div class='box'>
                
                    <h1> No Product Found In This Category </h1>
                
                </div>
            
            ";
        } else {

            echo "
            
                <div class='box'>
                
                    <h1> $cat_title </h1>
                    
                    <p> $cat_desc </p>
                
                </div>
            
            ";
        }

        while ($row_products = mysqli_fetch_array($run_products)) {

            $pro_id = $row_products['product_id'];
            $admin_id = $row_products['admin_id'];
            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_desc = $row_products['product_desc'];

            $pro_img1 = $row_products['product_img1'];

            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
                                    
                    <div class='product'>
                                        
                        <a href='details.php?pro_id=$pro_id'>
                                            
                            <img class='img-responsive' src='product_images/$pro_img1'>
                                            
                        </a>
                                            
                        <div class='text'>
                                            
                            <h3>
                                                
                                <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                                
                            </h3>
                                            
                        <p class='price'>

                            Rs$pro_price

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
    }
}

/// finish getcatpro functions ///


/// finish getRealIpUser functions ///


/// finish getRealIpUser functions ///

/// begin total_price functions ///

function total_price()
{

    global $db;

    $ip_add = getRealIpUser();

    $total = 0;

    $select_cart = "select * from cart where ip_add='$ip_add'";

    $run_cart = mysqli_query($db, $select_cart);

    while ($record = mysqli_fetch_array($run_cart)) {

        $pro_id = $record['p_id'];

        $pro_qty = $record['qty'];

        $get_price = "select * from products where product_id='$pro_id'";

        $run_price = mysqli_query($db, $get_price);

        while ($row_price = mysqli_fetch_array($run_price)) {

            $sub_total = $row_price['product_price'] * $pro_qty;

            $total += $sub_total;
        }
    }

    echo "$" . $total;
}

/// finish total_price functions ///

function items()
{

    global $db;

    //$ip_add = getRealIpUser();
    $count_items = 0;
    if (empty($_SESSION['customer_email'])) {
        echo $count_items;
    } else {
        $customer_email = $_SESSION['customer_email'];

        $get_items = "select * from cart where customer_email='$customer_email'";

        $run_items = mysqli_query($db, $get_items);

        $count_items = mysqli_num_rows($run_items);

        return $count_items;
    }
}

/*function get_safe_value($con, $user_query)
{
    if ($user_query != '') {
        $user_query = trim($user_query);
        return mysqli_real_escape_string($con, $user_query);
    }
}*/


function get_product($con, /*$limit = '',*/ $p_cat_id = '', $product_id = '', $search_str = '', $sort_order = '')
{
    //$sql = "select products.*,categories.categories from product, categories ";/*where product.status=1*/
    $sql = "select *from products";
    if ($p_cat_id != '') {
        $sql .= " and products.p_cat_id=$p_cat_id ";
    }
    if ($product_id != '') {
        $sql .= " and products.product_id=$product_id ";
    }
    $sql .= " and products.p_cat_id=categories.cat_id ";
    if ($search_str != '') {
        $sql .= " and (products.product_title like '%$search_str%' or products.product_desc like '%$search_str%') ";
    }
    //if ($sort_order != '') {
    //  $sql .= $sort_order;
    //} else {
    //  $sql .= " order by products.product_id desc ";
    //}
    //if ($limit != '') {
    //  $sql .= " limit $limit";
    //}
    //echo $sql;
    $res = mysqli_query($con, $sql);
    //$data = array();
    $row = mysqli_fetch_array($res); //{
    //$data[] = $row;
    //}

}
