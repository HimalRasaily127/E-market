<?php 

session_start();

$active='Cart';

include("includes/db.php");
include("functions/functions.php");
include("functions/language.php");
$en_select='';
$np_select='';		
$language='';
if((isset($_GET['language']) && $_GET['language']=='en') || !isset($_GET['language'])){
	$en_select='selected';	
	$language='en';
}else{
	$np_select='selected';
	$language='np';
}

?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];

    $get_sell_pirce="select * from sells where product_id='$product_id'";
    $run_sell_pirce=mysqli_query($db,$get_sell_pirce);
    $row_sell_pirce=mysqli_fetch_array($run_sell_pirce);
    
    $sell_price = empty($row_sell_pirce['sell_price']) ? 0 : $row_sell_pirce['sell_price'];

    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karnali Online Bazar ||<?php echo $active; ?></title>
    <link rel="stylesheet" href="styles/bootstrap-v533.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/logo-d-1 copy.png" type="image/x-icon">

    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f9fafb;
    }

    .product-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .review-item {
        border-bottom: 1px solid #ddd;
        padding: 15px 0;
    }

    .review-item:last-child {
        border-bottom: none;
    }

    .form-input,
    .form-select,
    .form-textarea {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 8px;
        width: 100%;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        outline: none;
        border-color: #337ab7;
        box-shadow: 0 0 0 1px #337ab7;
    }

    .btn-primary {
        background-color: #337ab7;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
    }

    .btn-primary:hover {
        background-color: #286090;
    }
    </style>
</head>


<body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Rating</h4>
                </div>
                <div class="modal-body">
                    <p>How would you rate this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button>
                    <button type="button" class="btn btn-primary" id="rating-now">Rate Now</button>
                </div>
            </div>
        </div>
    </div>
    <div id="top" class="hidden-xs">

        <div class="container">

            <div class="col-md-6 offer">

                <a href="#" class="btn btn-success btn-sm">

                    <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>

                </a>
                <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?> </a>

            </div>

            <div class="col-md-6">

                <ul class="menu" style="display:flex;justify-content:flex-end;align-items:center">
                    <div class="h-100 d-inline-flex align-items-center ms-4" title="<?php echo $header[$language][0];?>"
                        style="cursor: pointer; margin-right: 10px;">
                        <select class=" language-switcher btn btn-sm btn-outline-secondary"
                            aria-label="Language switcher" onchange="set_language()" name="language" id="language"
                            style=" padding: 0.25rem 0.5rem; padding: right 0.5rem;font-size: 1.5rem;border-radius: 0.25rem;">
                            <option value="en" <?php echo $en_select?>>English</option>
                            <option value="np" <?php echo $np_select?>> नेपाली </option>
                        </select>

                        <script>
                        function set_language() {
                            var language = jQuery('#language').val();
                            var current_url = window.location.href;
                            var url = new URL(current_url);
                            url.searchParams.set("language", language);
                            document.cookie = "language=" + language + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/"
                            window.location.href = url.href;
                        }
                        var language = getCookie('language');
                        if (language) {
                            jQuery('#language').val(language);
                        }

                        function getCookie(name) {
                            var nameEQ = name + "=";
                            var ca = document.cookie.split(';');
                            for (var i = 0; i < ca.length; i++) {
                                var c = ca[i];
                                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                            }
                            return null;
                        }
                        </script>
                    </div>



                    <li>
                        <a href="customer_register.php?language=<?php echo $language; ?>">Register</a>
                    </li>
                    <li>
                        <a href="checkout.php?language=<?php echo $language; ?>">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php?language=<?php echo $language; ?>">Go To Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php?language=<?php echo $language; ?>">

                            <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                           ?>

                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </div>
    <div id="navbar" class="navbar navbar-default">

        <div class="container">

            <div class="navbar-header">

                <a href="index.php" class="navbar-brand home">

                    <img src="images/logo-d-2.png" alt="Karnali-Store Logo" class="hidden-xs" style="width:100px;">
                    <img src="images/logo-d-1.png" alt="Karnali-store Logo Mobile" class="visible-xs"
                        style="width:100px;">

                </a>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                    <span class="sr-only">Toggle Navigation</span>

                    <i class="fa fa-align-justify"></i>

                </button>

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button>

            </div>

            <div class="navbar-collapse collapse" id="navigation">

                <div class="padding-nav">

                    <ul class="nav navbar-nav left">

                        <li class="<?php if($active=='Home') echo "active"; ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if($active=='Shop') echo "active"; ?>">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="<?php if($active=='Account') echo "active"; ?>">
                            <?php 
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php'>My Account</a>";
                            }else{
                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>"; 
                                }
                            ?>
                        </li>
                        <li class="<?php if($active=='Cart') echo "active"; ?>">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="<?php if($active=='Contact') echo "active"; ?>">
                            <a href="contact.php">Contact Us</a>
                        </li>

                    </ul>

                </div>

                <a href="../frant-end/cart.php" class="btn navbar-btn btn-primary right">

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php items(); ?> Items In Your Cart</span>

                </a>

                <div class="navbar-collapse collapse right">

                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse"
                        data-target="#search">

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button>

                </div>

                <div class="collapse clearfix" id="search">

                    <form method="get" action="results.php" class="navbar-form">

                        <div class="input-group">

                            <input type="text" class="form-control" placeholder="Search" name="user_query" required>

                            <span class="input-group-btn">

                                <button type="submit" name="search" value="Search" class="btn btn-primary">

                                    <i class="fa fa-search"></i>

                                </button>

                            </span>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <div id="content">
        <div class="container">
            <div class="col-md-12">

                <ul class="breadcrumb">

                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Shop
                    </li>

                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                    </li>
                    <li> <?php echo $pro_title; ?> </li>
                </ul>

            </div>

            <div class="col-md-3 hidden-xs">

                <?php 
    
    include("includes/sidebar.php");
    
    ?>

            </div>

            <div class="col-md-9">
                <div id="productMain" class="row">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive"
                                                src="admin_area/product_images/<?php echo $pro_img1; ?>"
                                                alt="Product 3-a"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive"
                                                src="admin_area/product_images/<?php echo $pro_img2; ?>"
                                                alt="Product 3-b"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive"
                                                src="admin_area/product_images/<?php echo $pro_img3; ?>"
                                                alt="Product 3-c"></center>
                                    </div>
                                </div>

                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">

                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                                <a href="#myCarousel" class="right carousel-control" data-slide="next">

                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Previous</span>
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"> <?php echo $pro_title; ?> </h1>

                            <?php add_cart(); ?>

                            <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal"
                                method="post">
                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Products Quantity</label>

                                    <div class="col-md-7">
                                        <select name="product_qty" id="" class="form-control">

                                            <option value="1" selected>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Product Size</label>

                                    <div class="col-md-7">

                                        <select name="product_size" class="form-control" required
                                            oninput="setCustomValidity('')"
                                            oninvalid="setCustomValidity('Must pick 1 size for the product')">

                                            <option value="Small" selected>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>

                                        </select>

                                    </div>
                                </div>
                                <?php
                                // Check if $product_id is set
                                if (!isset($product_id)) {
                                    die("Error: \$product_id is not set.");
                                }

                                // Query to get average rating
                                $get_avg_rating = "SELECT AVG(r_rating) AS average_rating FROM product_reviews WHERE product_id='$product_id'";
                                $run_avg_rating = mysqli_query($con, $get_avg_rating);

                                // Check for query errors
                                if (!$run_avg_rating) {
                                    die("Query failed: " . mysqli_error($con));
                                }

                                // Fetch results
                                $row_avg_rating = mysqli_fetch_array($run_avg_rating);
                                $average_rating = round($row_avg_rating['average_rating'] ?? 0, 1); // Default to 0 if no reviews
                                $full_stars = floor($average_rating);
                                $half_star = ($average_rating - $full_stars) >= 0.5 ? 1 : 0;
                                ?>

                                <div class="flex justify-center items-center text-yellow-500"
                                    style="margin-top:10px; align-items: center; text-align: center;">
                                    <strong>Average Rating:</strong>
                                    <span style="color: yellow;">
                                        <?php
                                        for ($i = 0; $i < $full_stars; $i++) {
                                            echo '<i class="fas fa-star"></i>';
                                        }
                                        if ($half_star) {
                                            echo '<i class="fas fa-star-half-alt"></i>';
                                        }
                                        for ($i = $full_stars + $half_star; $i < 5; $i++) {
                                            echo '<i class="far fa-star"></i>';
                                        }
                                        ?>
                                    </span>
                                    <span class="ml-2">(<?php echo $average_rating; ?>/5)</span>
                                </div>

                                <div class='vendor-info text-left' style='display: inline-block; text-align: center;'>
                                    <p class='price mb-0' style='display: inline-block; margin-left: 80px; font-size: 20px;'>Rs.
                                        <strike style='color: red; display: inline-block;'> <?php if ($sell_price == 0) { $sell_price = $pro_price; } 
                                     else { 
                                        echo " $pro_price"; 
                                     } 
                                     
                                    echo " 
                                     </strike>
                                </p>

                                <p class='price mb-0' style='display: inline-block; margin-left: 10px;'> $sell_price</p>";
                                ?>
                                </div>

                                <p class="text-center buttons">
                                    <button class="btn btn-danger i fa fa-shopping-cart"> Add
                                        to cart</button>
                                </p>

                            </form>

                        </div>

                        <div class="row" id="thumbs">

                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1"
                                        class="img-responsive">
                                </a>
                            </div>

                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">

                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2"
                                        class="img-responsive">
                                </a>
                            </div>

                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">

                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="product 4"
                                        class="img-responsive">
                                </a>
                            </div>

                        </div>

                    </div>


                </div>

                <div class="box" id="details">

                    <h4>Product Details</h4>

                    <p>

                        <?php echo $pro_desc; ?>

                    </p>

                    <h4>Size</h4>

                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                    </ul>

                    <hr>

                </div>

                <div id="row same-heigh-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">Products You May be Like</h3>
                        </div>
                    </div>

                    <?php 
                   
                    $get_products = "select * from products order by rand() LIMIT 0,3";
                   
                    $run_products = mysqli_query($con,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_img1 = $row_products['product_img1'];
                       
                       $pro_price = $row_products['product_price'];
                       
                       echo "
                       
                        <div class='col-md-3 col-sm-6 center-responsive'>
                        
                            <div class='product same-height'>
                            
                                <a href='details.php?pro_id=$pro_id & language=$language'>
                                
                                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                
                                </a>
                                
                                <div class='text'>
                                
                                    <h3> <a href='details.php?pro_id=$pro_id & language=$language'> $pro_title </a> </h3>
                                    
                                    <p class='price'> Rs. $pro_price </p>
                                
                                </div>
                            
                            </div>
                        
                        </div>
                       
                       ";
                       
                   }
                   
                   ?>

                </div>

            </div>

        </div>
    </div>
    <div class="box center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box" style="margin-top: 20px;">
                        <h4 style="text-align: center;">Reviews</h4>

                        <!-- Reviews -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h3 class="font-bold">Customer Reviews</h3>
                                <?php
                                    $get_reviews = "select * from product_reviews where product_id='$product_id' LIMIT 5";
                                    $run_reviews = mysqli_query($con, $get_reviews);
                                    $count = mysqli_num_rows($run_reviews);
                                    if ($count > 0) {
                                        while ($row_reviews = mysqli_fetch_array($run_reviews)) {
                                            $user_id = $row_reviews['user_id'];
                                            $review = $row_reviews['r_text'];
                                            $rating = $row_reviews['r_rating'];
                                            $date = $row_reviews['date'];

                                            $get_user = "select * from customers where customer_id='$user_id'";
                                            $run_user = mysqli_query($con, $get_user);
                                            $row_user = mysqli_fetch_array($run_user);
                                            $user_name = $row_user['customer_name'];
                                            $user_image = $row_user['customer_image'];
                                            if (empty($user_image)) {
                                                $user_image = ucfirst(substr($row_user['customer_email'], 0, 1)) . '.png';
                                            }

                                            // Calculate the time difference between current time and review date
                                            $review_date = strtotime($date);  // Convert the review date to timestamp
                                            $current_time = time();  // Get the current time in timestamp
                                            $time_diff = $current_time - $review_date; // Difference in seconds

                                            // Time difference formatting
                                            if ($time_diff < 60) {
                                                $time_ago = $time_diff . ' seconds ago';
                                            } elseif ($time_diff < 3600) {
                                                $time_ago = floor($time_diff / 60) . ' minutes ago';
                                            } elseif ($time_diff < 86400) {
                                                $time_ago = floor($time_diff / 3600) . ' hours ago';
                                            } else {
                                                $time_ago = floor($time_diff / 86400) . ' days ago';
                                            }

                                            if (strlen($review) > 0 && $rating > 0) {
                                                echo "
                                                <div class='review-item'>
                                                    <img src='customer/customer_images/$user_image' class='img-responsive img-circle' width='50' height='50'>
                                                    <h5><strong>$user_name</strong> 
                                                        <small class='text-muted'>- $time_ago</small>
                                                    </h5>
                                                    <p class='text-warning'>";
                                                    
                                                    // Display rating stars
                                                    for ($i = 0; $i < 5; $i++) {
                                                        if ($i < $rating) {
                                                            echo "<i class='fas fa-star' style='color: yellow'></i>";
                                                        } else {
                                                            echo "<i class='fas fa-star'></i>";
                                                        }
                                                    }
                                                echo "</p>
                                                    <p>$review</p>
                                                </div>";
                                            } else {
                                                echo "<p class='text-center'>There was an error with your review.</p>";
                                            }
                                        }
                                    } else {
                                        echo "<p class='text-center'>No reviews yet.</p>";
                                    }
                                    ?>
                            </div>
                        </div>

                        <!-- Leave a Review -->
                        <div class="row mt-4" id="leave-review">
                            <div class="col-md-12">
                                <div class="box center" style="padding: 20px; width: 60%; margin: 0 auto;">
                                    <h3 class="font-bold text-center">Leave a Review</h3>
                                    <form method="POST" action="">
                                        <div class="form-group input-group-sm">
                                            <label for="rating">Rating (5 out of)</label>
                                            <select id="rating" class="form-control form-control-sm" required
                                                name="rating">
                                                <option value="5" selected>5 - Excellent</option>
                                                <option value="4">4 - Very Good</option>
                                                <option value="3">3 - Good</option>
                                                <option value="2">2 - Average</option>
                                                <option value="1">1 - Bad</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group-sm">
                                            <label for="review">Review</label>
                                            <textarea id="review" class="form-control form-control-sm" rows="10"
                                                cols="50" placeholder="Write your review here" required
                                                style="height: 250px;" name="review"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm" name="submit_review">Submit
                                            Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <?php 
if (isset($_POST['submit_review'])) {
    if (!isset($_SESSION['customer_email'])) {
        echo "<script>alert('Please log in to leave a review.')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";
        exit;
    }

    $consumer_email = $_SESSION['customer_email'];

    // Fetch user ID
    $get_u_id = "SELECT customer_id FROM customers WHERE customer_email='$consumer_email'";
    $run_u_id = mysqli_query($con, $get_u_id);
    $row_u_id = mysqli_fetch_array($run_u_id);

    if (!$row_u_id) {
        echo "<script>alert('User not found.')</script>";
        exit;
    }

    $u_id = $row_u_id['customer_id'];
    $product_id = $_GET['pro_id']; // Ensure this is passed securely
    $review = htmlspecialchars($_POST['review'], ENT_QUOTES, 'UTF-8');
    $rating = intval($_POST['rating']);
    $date = date('Y-m-d');

    // Fetch product title
    $get_product = "SELECT product_title FROM products WHERE product_id='$product_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);

    if (!$row_product) {
        echo "<script>alert('Product not found.')</script>";
        exit;
    }

    $pro_title = $row_product['product_title'];

    // Insert review
    $insert_review = "INSERT INTO product_reviews (product_id, user_id, r_text, r_rating, date) VALUES ('$product_id', '$u_id', '$review', '$rating', '$date')";
    $run_review = mysqli_query($con, $insert_review);

    if ($run_review) {
        echo "<script>alert('Review has been submitted for product: $pro_title')</script>";
        echo "<script>window.open('details.php?pro_id=$product_id', '_self')</script>";
    } else {
        echo "<script>alert('Failed to submit review. Please try again later.')</script>";
    }
}
?>




        <?php 

    
    include("includes/footer.php");
    
    ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script> -->

        <script src="js/bootstrap-v533.min.js"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>