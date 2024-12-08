<?php 

session_start();

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

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $page_title[$language][0]; ?></title>
<link rel="stylesheet" href="styles/bootstrap-v533.min.css">
<!-- Latest compiled and minified CSS -->

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" > -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

<link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
<link rel="stylesheet" href="styles/style.css">
<link rel="shortcut icon" href="images/logo-d-1 copy.png" type="image/x-icon">
</head>

<body>
    <div class="notice-bar visible-xs">
        <div class="container">
            <div class="text-center">
                <span class="fa fa-mobile fa-2x"></span>
                <span> <?php echo $header_top[$language][1]; ?> </span>
            </div>
        </div>
    </div>
    <div id="top" class="hidden-xs">

        <div class="container">

            <div class="col-md-6 offer">

                <a href="#" class="btn btn-success btn-sm">

                    <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo $header_top[$language][0];
                       
                   }else{
                       
                       echo $header_top[$language][1] . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>

                </a>
                <a href="checkout.php?language=<?php echo $language; ?>"><?php items(); ?> <?php echo $header_top[$language][2];?> <?php total_price(); ?> </a>

            </div>

            <div class="col-md-6">

                <ul class="menu" style="display:flex;justify-content:flex-end;align-items:center">
                    <div class="h-100 d-inline-flex align-items-center ms-4" title="<?php echo $header[$language][0];?>" style="cursor: pointer; margin-right: 10px;">
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


                    <li style="margin-right:10px">
                        <a href="customer_register.php?language=<?php echo $language; ?>"><?php echo $header_top[$language][3]; ?></a>
                    </li>
                    <li style="margin-right:10px">
                        <a href="seller_register.php?language=<?php echo $language; ?>" target="_blank"><?php echo $header_top[$language][4]; ?></a>
                    </li>
                    <li style="margin-right:10px">
                        <a href="cart.php?language=<?php echo $language; ?>"><?php echo $header_top[$language][5]; ?></a>
                    </li>
                    <li style="margin-right:10px">
                        <a href="checkout.php?language=<?php echo $language; ?>">

                            <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php?language=$language'>". $header_top[$language][6] ." </a>";

                               }else{

                                echo " <a href='logout.php?language=$language'>". $header_top[$language][7] ."</a> ";

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

                <a href="index.php?language=<?php echo $language; ?>" class="navbar-brand home">

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

                        <li class="<?php if($active=='Home') echo "active"; ?>" data-toggle="tooltip"
                            data-placement="bottom" title="Home">
                            <a href="index.php?language=<?php echo $language; ?>"><?php echo $header[$language][1]; ?></a>
                        </li>
                        <li class="<?php if($active=='Shop') echo "active"; ?>" data-toggle="tooltip"
                            data-placement="bottom" title="Shoping anything">
                            <a href="shop.php?language=<?php echo $language; ?>"><?php echo $header[$language][2]; ?></a>
                        </li>
                        <li class="<?php if($active=='Account') echo "active"; ?>" data-toggle="tooltip"
                            data-placement="bottom" title="Manage Your Account">
                            <?php 
                            if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php?language=$language'>". $header[$language][3] ."</a>";
                            }else{
                                echo "<a href='customer/my_account.php?language=$language&my_orders'>".$header[$language][3]."</a>"; 
                                }
                            ?>
                        </li>
                        <li class="<?php if($active=='Cart') echo "active"; ?>" data-toggle="tooltip"
                            data-placement="bottom" title="Check Shopping Cart">
                            <a href="cart.php?language=<?php echo $language; ?>"><?php echo $header[$language][4]; ?></a>
                        </li>
                        <li class="<?php if($active=='Contact') echo "active"; ?>" data-toggle="tooltip"
                            data-placement="bottom" title="leave a message">
                            <a href="contact.php?language=<?php echo $language; ?>"> <?php echo $header[$language][5];?></a>
                        </li>


                    </ul>

                </div>

                <a href="../frant-end/cart.php?language=<?php echo $language; ?>" class="btn navbar-btn btn-primary right" data-toggle="tooltip"
                    data-placement="bottom" title="Check your Shopping Cart">

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php items(); ?> <?php echo $header_top[$language][8];?></span>

                </a>

                <div class="navbar-collapse collapse right">

                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse"
                        data-target="#search">

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button>

                </div>

                <div class="collapse clearfix" id="search">

                    <form method="get" action="results.php?language=<?php echo $language; ?>" class="navbar-form">

                        <div class="input-group">

                            <input type="text" class="form-control" placeholder="<?php echo $header[$language][6]; ?>" name="user_query" required maxlength="100">

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