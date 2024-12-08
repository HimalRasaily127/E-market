<?php 

$db = mysqli_connect("localhost","root","","myshop");

/// begin getRealIpUser functions ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// finish getRealIpUser functions ///

/// begin add_cart functions ///

function add_cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = (empty($_POST['product_qty'])) ? 1 : $_POST['product_qty'];
        
        $product_size = (empty($_POST['product_size'])) ? 'No SELECT' : $_POST['product_size'];
        
        $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }
        
    }
    
}

//get popular products

function get_popular_products(){
    
    global $db;
    
    $get_products = "SELECT p.* FROM products p 
                    INNER JOIN (SELECT product_id, AVG(r_rating) as avg_rating 
                                FROM product_reviews 
                                GROUP BY product_id
                                ORDER BY avg_rating DESC
                                LIMIT 4) as pr 
                    ON p.product_id = pr.product_id
                    ORDER BY pr.avg_rating DESC";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
        
        if (!isset($pro_id)) {
            die("Error: \$pro_id is not set.");
        }
        
        $get_rating_info = "SELECT AVG(r_rating) AS average_rating, COUNT(r_rating) AS rating_count FROM product_reviews WHERE product_id='$pro_id'";
        $run_rating_info = mysqli_query($db, $get_rating_info);

        if (!$run_rating_info) {
            die("Query failed: " . mysqli_error($db));
        }

        $row_rating_info = mysqli_fetch_array($run_rating_info);
        $average_rating = round($row_rating_info['average_rating'] ?? 0, 1);
        $rating_count = $row_rating_info['rating_count'] ?? 0;
        $full_stars = floor($average_rating);
        $half_star = ($average_rating - $full_stars) >= 0.5 ? 1 : 0;

        echo "
        <div class='col-md-3 col-sm-6' style='height:390px;'>
            <div class='product'>
                <a href='details.php?pro_id=$pro_id'>
                    <img style='max-height:200px;max-width:100%;' class='img-responsive' src='admin_area/product_images/$pro_img1'>
                </a>
                 <div class='flex justify-center items-center text-yellow-500' style='margin-top:10px; align-items: center; text-align: center;'>
                    
                    <span style='color: yellow;'>
                        <script>
                            var full_stars = $full_stars;
                            var half_star = $half_star;
                            var html = '';
                            for (var i = 0; i < full_stars; i++) {
                                html += '<i class=\"fas fa-star\"></i>';
                            }
                            if (half_star) {
                                html += '<i class=\"fas fa-star-half-alt\"></i>';
                            }
                            for (var i = full_stars + half_star; i < 5; i++) {
                                html += '<i class=\"far fa-star\"></i>';
                            }
                            document.write(html);
                        </script>
                    </span>
                    <span class='ml-2'>($average_rating/5)</span>
                </div>
                <div class='text'>
                    <h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>
                    <p class='button'>
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>View Details</a>
                        <a class='btn btn-danger' href='details.php?pro_id=$pro_id'>
                            <i class='fa fa-shopping-cart'></i> Add to Cart
                        </a>                    </p>
                </div>
            </div>
        </div>
        ";
        
    }
}

/// begin getPro functions ///

function getPro(){
    
    global $db;
    
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    
    $run_products = mysqli_query($db, $get_products);
    
    while ($row_products = mysqli_fetch_array($run_products)) {
        
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
        $pro_manufacturer = $row_products['manufacturer_id'];
        
        if (!isset($pro_id)) {
            die("Error: \$pro_id is not set.");
        }

        $get_avg_rating = "SELECT AVG(r_rating) AS average_rating FROM product_reviews WHERE product_id='$pro_id'";
        $run_avg_rating = mysqli_query($db, $get_avg_rating);

        if (!$run_avg_rating) {
            die("Query failed: " . mysqli_error($db));
        }
        $get_vender="select * from manufacturers where manufacturer_id='$pro_manufacturer'";
        $run_vender=mysqli_query($db,$get_vender);
        $row_vender=mysqli_fetch_array($run_vender);
        $vender_name=$row_vender['manufacturer_title'];
        $vender_image=$row_vender['manufacturer_image'];


        $get_sell_pirce="select * from sells where product_id='$pro_id'";
        $run_sell_pirce=mysqli_query($db,$get_sell_pirce);
        $row_sell_pirce=mysqli_fetch_array($run_sell_pirce);
        
        $sell_price = empty($row_sell_pirce['sell_price']) ? 0 : $row_sell_pirce['sell_price'];


        $row_avg_rating = mysqli_fetch_array($run_avg_rating);
        $average_rating = round($row_avg_rating['average_rating'] ?? 0, 1);
        $full_stars = floor($average_rating);
        $half_star = ($average_rating - $full_stars) >= 0.5 ? 1 : 0;

        echo "
        <div class='col-md-3 col-sm-6' style='height:390px;'>
            <div class='product'>
                ";if ($sell_price > 0) { echo "
                <div style='background-color: #ffc107; color: white; position: absolute; top: 10px; right:  10px; padding: 5px 10px; border-radius: 5px;'>
                    <b>Sell</b>

                </div>
                ";} echo "
                
                <a href='details.php?pro_id=$pro_id'>
                    <img style='max-height:200px;max-width:100%;' class='img-responsive' src='admin_area/product_images/$pro_img1'>
                </a>
                <div class='flex justify-center items-center text-yellow-500' style='margin-top:10px; align-items: center; text-align: center;'>
                    
                    <span style='color: yellow;'>
                        <script>
                            var full_stars = $full_stars;
                            var half_star = $half_star;
                            var html = '';
                            for (var i = 0; i < full_stars; i++) {
                                html += '<i class=\"fas fa-star\"></i>';
                            }
                            if (half_star) {
                                html += '<i class=\"fas fa-star-half-alt\"></i>';
                            }
                            for (var i = full_stars + half_star; i < 5; i++) {
                                html += '<i class=\"far fa-star\"></i>';
                            }
                            document.write(html);
                        </script>
                    </span>
                    <span class='ml-2'>($average_rating/5)</span>
                </div>
                <div class='text'>
                    <h3>
                        <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                    </h3>
                   <div class='d-flex justify-content-between align-items-center'>
                            <div class='vendor-info text-left' style='display: inline-block;'>
                                <p class='price mb-0'  style='display: inline-block; font-size: 15px; '>Rs.
                                     <strike style='color: red; display: inline-block; margin-right: 10px;'> "; if ($sell_price == 0) { $sell_price = $pro_price; } 
                                     else { 
                                        echo " $pro_price"; 
                                     } 
                                     echo "</strike>
                                </p>

                                <p class='price mb-0' style='display: inline-block; '> $sell_price</p>
                            </div>
                            <div class='vendor-info text-right' style='display: inline-block; float: right; margin-right: 10px;'>
                                <span class='rounded-box p-1' style='color: white; background: green; border-radius: 20px; padding: 5px;'>$vender_name</span>
                            </div>
                        </div>
                    <p class='button'>
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>View Details</a>
                        <a class='btn btn-danger' href='details.php?pro_id=$pro_id'>
                            <i class='fa fa-shopping-cart'></i> Add to Cart
                        </a>
                    </p>
                </div>
            </div>
        </div>
        ";
    }
}

/// finish getPro functions ///

/// start brand get functions///

function getbrands(){
global $db;

$get_manufacturer = "select * from manufacturers order by 1 DESC LIMIT 0,4";
$run_manufacturer = mysqli_query($db,$get_manufacturer);

while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){

$manufacturer_id = $row_manufacturer['manufacturer_id'];
$manufacturer_title = $row_manufacturer['manufacturer_title'];
$manufacturer_image = $row_manufacturer['manufacturer_image'];

echo "<div class='col-md-4 col-sm-6 col-xs-12 single'>
    <div class='visible-xs'>
        <div id='manufacturer-carousel' class='carousel slide' data-ride='carousel'>
            <div class='carousel-inner'>
                <div class='item active'>
                    <div class='product'>
                        <div class='text'>
                            <h3> $manufacturer_title </h3>
                            <img class='img-responsive img-circle' src='admin_area/other_images/$manufacturer_image '>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='hidden-xs'>
        <div class='product'>
            <div class='text'>
                <h3> $manufacturer_title </h3>
                <img class='img-responsive' src='admin_area/other_images/$manufacturer_image'>
            </div>
        </div>
    </div>
</div>";


}

}


/// finish getCats functions ///

/// finish getRealIpUser functions ///

function items(){

global $db;

$ip_add = getRealIpUser();

$get_items = "select * from cart where ip_add='$ip_add'";

$run_items = mysqli_query($db,$get_items);

$count_items = mysqli_num_rows($run_items);

echo $count_items;

}

/// finish getRealIpUser functions ///

/// begin total_price functions ///

function total_price(){

global $db;

$ip_add = getRealIpUser();

$total = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($db,$select_cart);

while($record=mysqli_fetch_array($run_cart)){

$pro_id = $record['p_id'];
$pro_qty = (empty($record['qty'])) ? 1 : $record['qty'];

$get_sells= "select * from sells where product_id='$pro_id'";

$run_sells = mysqli_query($db,$get_sells);

while($row_sells = mysqli_fetch_array($run_sells)){
    $sell_price = $row_sells['sell_price'];
}

$get_price = "select * from products where product_id='$pro_id'";

$run_price = mysqli_query($db,$get_price);

while($row_price=mysqli_fetch_array($run_price)){

$product_price = $row_price['product_price'];

if(empty($sell_price)){
    $pro_price = $product_price;
}else{
    $pro_price = $sell_price;
}



$sub_total = $pro_price*$pro_qty;

$total += $sub_total;

}

}

echo "Rs." . $total;

}

/// finish total_price functions ///

/// Begin getProducts(); functions ///
function getProducts(){

    global $db;
    $aWhere = array();

    /// Begin for Manufacturer ///
    
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

        foreach($_REQUEST['man'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'manufacturer_id='.(int)$sVal;

            }

        }

    }

    /// Finish for Manufacturer ///  

    /// Begin for Product Categories /// 

    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'p_cat_id='.(int)$sVal;

            }

        }

    }    

    /// Finish for Product Categories /// 

    /// Begin for Categories /// 

    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

        foreach($_REQUEST['cat'] as $sKey=>$sVal){

            if((int)$sVal!=0){

                $aWhere[] = 'cat_id='.(int)$sVal;

            }

        }

    }    

    /// Finish for Categories /// 

    $per_page=6;

    if(isset($_GET['page'])){

        $page = $_GET['page'];

    }else{
        $page=1;
    }

    $start_from = ($page-1) * $per_page;
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    $sOrder = " order by (select AVG(r_rating) from product_reviews where product_id=products.product_id) desc ";
    $sLimit = " LIMIT $start_from,$per_page";
    $get_products = "select * from products ".$sWhere.$sOrder.$sLimit;
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){

        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_img1 = $row_products['product_img1'];
        $pro_manufacturer = $row_products['manufacturer_id'];

        $get_vender="select * from manufacturers where manufacturer_id='$pro_manufacturer'";
        $run_vender=mysqli_query($db,$get_vender);
        $row_vender=mysqli_fetch_array($run_vender);
        $vender_name=$row_vender['manufacturer_title'];
        $vender_image=$row_vender['manufacturer_image'];

        $get_sell_pirce="select * from sells where product_id='$pro_id'";
        $run_sell_pirce=mysqli_query($db,$get_sell_pirce);
        $row_sell_pirce=mysqli_fetch_array($run_sell_pirce);
        
        $sell_price = empty($row_sell_pirce['sell_price']) ? 0 : $row_sell_pirce['sell_price'];


        $get_avg_rating = "SELECT AVG(r_rating) AS average_rating FROM product_reviews WHERE product_id='$pro_id'";
        $run_avg_rating = mysqli_query($db, $get_avg_rating);

        if (!$run_avg_rating) {
            die("Query failed: " . mysqli_error($db));
        }

        $row_avg_rating = mysqli_fetch_array($run_avg_rating);
        $average_rating = round($row_avg_rating['average_rating'] ?? 0, 1);
        $full_stars = floor($average_rating);
        $half_star = ($average_rating - $full_stars) >= 0.5 ? 1 : 0;
       



        echo "
        
            <div class='col-md-4 col-sm-6' style='height:auto;overflow:hidden;'>

                <div class='product'>
                  ";if ($sell_price > 0) { echo "
                <div style='background-color: #ffc107; color: white; position: absolute; top: 10px; right:  10px; padding: 5px 10px; border-radius: 5px;'>
                    <b>Sell</b>

                </div>
                ";} echo "
                

                    <a href='details.php?pro_id=$pro_id'>

                        <img class='img-responsive center-block' style='max-height:200px;max-width:100%;' src='admin_area/product_images/$pro_img1'>

                    </a>
                    <div class='flex justify-center items-center text-yellow-500' style='margin-top:10px; align-items: center; text-align: center;'>
                    
                    <span style='color: yellow;'>
                        <script>
                            var full_stars = $full_stars;
                            var half_star = $half_star;
                            var html = '';
                            for (var i = 0; i < full_stars; i++) {
                                html += '<i class=\"fas fa-star\"></i>';
                            }
                            if (half_star) {
                                html += '<i class=\"fas fa-star-half-alt\"></i>';
                            }
                            for (var i = full_stars + half_star; i < 5; i++) {
                                html += '<i class=\"far fa-star\"></i>';
                            }
                            document.write(html);
                        </script>
                    </span>
                    <span class='ml-2'>($average_rating/5)</span>
                </div>

                    <div class='text'>

                        <h3> $pro_title </h3>

                        <div class='d-flex justify-content-between align-items-center'>
                            <div class='vendor-info text-left' style='display: inline-block;'>
                                <p class='price mb-0'  style='display: inline-block; font-size: 14px;'>Rs.
                                     <strike style='color: red; display: inline-block;'> "; if ($sell_price == 0) { $sell_price = $pro_price; } 
                                     else { 
                                        echo " $pro_price"; 
                                     } 
                                     echo "</strike>
                                </p>

                                <p class='price mb-0' style='display: inline-block;'> $sell_price</p>
                            </div>
                            <div class='vendor-info text-right' style='display: inline-block; float: right; margin-right: 10px;'>
                                <span class='rounded-box p-1' style='color: white; background: green; border-radius: 20px; padding: 5px;'>$vender_name</span>
                            </div>
                        </div>
                        <p class='buttons'>

                            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>View Details</a>
                            <a class='btn btn-danger' href='details.php?pro_id=$pro_id'>
                            
                                <i class='fa fa-shopping-cart'></i> Add To Cart 
                            
                            </a>

                        </p>

                    </div>

                </div>

            </div>

        
        ";

    }

}

/// finish getProducts(); functions ///

/// begin getPaginator(); functions ///

function getPaginator(){

global $db;

$per_page=6;
$aWhere = array();
$aPath = '';

/// Begin for Manufacturer ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;
$aPath .= 'man[]='.(int)$sVal.'&';

}

}

}

/// Finish for Manufacturer ///

/// Begin for Product Categories ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;
$aPath .= 'p_cat[]='.(int)$sVal.'&';

}

}

}

/// Finish for Product Categories ///

/// Begin for Categories ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;
$aPath .= 'cat[]='.(int)$sVal.'&';

}

}

}

/// Finish for Categories ///

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
$query = "select * from products".$sWhere;
$result = mysqli_query($db,$query);
$total_records = mysqli_num_rows($result);
$total_pages = ceil($total_records / $per_page);

echo "<li> <a href='shop.php?page=1";
    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'First Page'."</a></li>";

for($i=1; $i<=$total_pages; $i++){ echo "<li> <a href='shop.php?page=" .$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a>
    </li>";

    };

    echo "<li> <a href='shop.php?page=$total_pages";

    if(!empty($aPath)){

        echo "&".$aPath;

    }

    echo "'>".'Last Page'."</a></li>";

    }

    /// finish getPaginator(); functions ///

    ?>