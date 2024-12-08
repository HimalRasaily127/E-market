<?php
$active = 'Home';
include("includes/header.php");

?>


<div class="container">
    <div class="row" style="margin-left: 0px;">
        <div class="col-md-2 order-md-2 hidden-xs">
            <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        for you
                        <div class="pull-left">
                            <a href="JavaScript:Void(0);" style="color:black;">
                            </a>
                        </div>
                    </h3>
                </div>
                <div class="panel-collapse collapse-data">
                    <div class="panel-body">
                        <p class="lead text-center">
                            <a href="shop.php?language=<?php echo $language; ?>"><?php echo $home[$language][0];?></a>
                        </p>
                        <br>
                        <style>
                        .dropdown:hover .dropdown-menu {
                            display: block;
                            margin-left: 120px;
                            margin-right: -100px;
                        }
                        </style>
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                            $get_categories = "SELECT * FROM categories";
                            $run_categories = mysqli_query($con, $get_categories);
                            while ($row_categories = mysqli_fetch_array($run_categories)) {
                                $cat_id = $row_categories['cat_id'];
                                $cat_title = $row_categories['cat_title'];
                                echo "<li class='dropdown'>
                                <a href='JavaScript:Void(0);' class='dropdown-toggle' data-toggle='dropdown'>
                                    $cat_title <span class='caret'></span>
                                </a>
                                <ul class='dropdown-menu'>";
                                $get_products = "SELECT * FROM products WHERE cat_id=$cat_id";
                                $run_products = mysqli_query($con, $get_products);
                                while ($row_products = mysqli_fetch_array($run_products)) {
                                    $product_id = $row_products['product_id'];
                                    $product_title = $row_products['product_title'];
                                    $product_img = $row_products['product_img1'];
                                    echo "<li>
                                        <a href='details.php?pro_id=$product_id &language=$language'>
                                            <img src='vender/product_images/$product_img' alt='$product_title' style='width: 50px; height: 50px;'>
                                            $product_title
                                        </a>
                                    </li>";
                                }
                                echo "</ul>
                            </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 order-md-1 visible-xs-block" style="margin-top: 0px;">
            <div id="myCarousel-mobile" class="carousel slide" data-ride="carousel" style="width: 100%;">
                <div class="carousel-inner" style="width: 100%; height: 500px;">

                    <?php
                   $get_slides = "SELECT * FROM slider where type='mobile' LIMIT 0,3";
                   $run_slides = mysqli_query($con, $get_slides);
                   $active = true;
                   while ($row_slides = mysqli_fetch_array($run_slides)) {
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];

                        echo "<div class='item" . ($active ? ' active' : '') . "' style='width: 100%; height: 100%;'>
                            <a href='$slide_url'>
                                <img src='admin_area/slides_images/$slide_image' class='img-responsive' style='width: 100%; height: 100%;'>
                            </a>
                        </div>";
                        $active = false;
                    }
                    ?>
                </div>
                <a class="left carousel-control" href="#myCarousel-mobile" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel-mobile" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <div class="col-md-6 order-md-1 hidden-xs"
            style="margin-top: 5px; width:82%; @media(max-width: 767px){width:100%;}">
            <div class="container cantainer-responsive" id="slider" style="width: 100%;">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                            <?php
                            $get_slides = "SELECT * FROM slider WHERE type='desktop' LIMIT 1,3";
                            $run_slides = mysqli_query($con, $get_slides);
                            $slide_count = mysqli_num_rows($run_slides);
                            for ($i = 1; $i <= $slide_count; $i++) {
                                echo "<li data-target='#myCarousel' data-slide-to='$i'></li>";
                            }
                            ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php
                            $get_slides = "SELECT * FROM slider WHERE type='desktop' LIMIT 0,1";
                            $run_slides = mysqli_query($con, $get_slides);
                            while ($row_slides = mysqli_fetch_array($run_slides)) {
                                $slide_name = $row_slides['slide_name'];
                                $slide_image = $row_slides['slide_image'];
                                $slide_url = $row_slides['slide_url'];
                                echo "
                    <div class='item active'>
                        <a href='$slide_url'>
                            <img src='admin_area/slides_images/$slide_image'>
                        </a>
                    </div>
                ";
                            }
                            $get_slides = "SELECT * FROM slider WHERE type='desktop' LIMIT 1,3";
                            $run_slides = mysqli_query($con, $get_slides);
                            while ($row_slides = mysqli_fetch_array($run_slides)) {
                                $slide_name = $row_slides['slide_name'];
                                $slide_image = $row_slides['slide_image'];
                                $slide_url = $row_slides['slide_url'];
                                echo "
                    <div class='item'>
                        <a href='$slide_url'>
                            <img src='admin_area/slides_images/$slide_image'>
                        </a>
                    </div>
                ";
                            }
                            ?>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.vendors-row {
    white-space: nowrap;
    /* Prevent items from wrapping to the next line */
    display: flex;
    /* Enable horizontal alignment */
    justify-content: center;
    /* Center items horizontally */
    overflow-x: auto;
    /* Allow horizontal scrolling */
    padding: 15px 0;
    /* Add spacing around the items */
    background-color: #f9f9f9;
    /* Optional light background */
}

.vendor-item {
    margin: 0 10px;
    flex: 0 0 auto;
    /* Ensure fixed size for items */
    text-align: center;
    width: 150px;
    /* Set fixed width for each vendor item */
}

.vendor-item img {
    border-radius: 50%;
    /* Circular images */
}

.vendors-row::-webkit-scrollbar {
    height: 8px;
    /* Customize scrollbar height */
}

.vendors-row::-webkit-scrollbar-thumb {
    background-color: #007bff;
    /* Blue thumb */
    border-radius: 10px;
    /* Rounded edges */
}

.vendors-row::-webkit-scrollbar-track {
    background-color: #f1f1f1;
    /* Light background for scrollbar track */
}
</style>

<?php
 $get_vendors = "SELECT * FROM vendors where status='active'";
$run_vendors = mysqli_query($con, $get_vendors);
while ($row_vendors = mysqli_fetch_array($run_vendors)) {
    $vendor_id = $row_vendors['vendor_id'];
    $vendor_name = $row_vendors['vendor_name'];
    $vendor_image = $row_vendors['vendor_image'];
    if($row_vendors['status']=='active'){
    echo "
    <div id='hot'>
    <div class='box'>
        <div class='container'>
            <div class='col-md-12'>
                <h2 class='text-center'>Best Sellers</h2>
            </div>
        </div>
    </div>
</div>
    <div id='content' class='container hidden-xs'>
    <div class='row'>
        <div class='col-md-12'>
            <!-- Horizontal scrollable container -->
            <div class='vendors-row d-flex flex-nowrap overflow-auto'>
                <div class='vendor-item'>
                    <a href='shop.php?vendor=$vendor_id'>
                        <img src='vender/vender_image/$vendor_image' alt='Vendor Image' class='img-responsive img-circle'>
                        <h4>$vendor_name</h4>
                    </a>
                </div>
               
            </div>
        </div>
    </div>
</div>
";
    }else{
        echo "<p style='text-align:center;'>No Vendors Available</p>";
    }
}
?>
<br>
<br class="hidden-lg hidden-md"><br class="hidden-lg hidden-md">


<!-- <div id="advantages">

    <div class="container">

        <div class="same-height-row">

            <?php 
           
           $get_boxes = "select * from boxes_section";
           $run_boxes = mysqli_query($con,$get_boxes);

           while($run_boxes_section=mysqli_fetch_array($run_boxes)){

            $box_id = $run_boxes_section['box_id'];
            $box_title = $run_boxes_section['box_title'];
            $box_desc = $run_boxes_section['box_desc'];
           
           ?>

            <div class="col-sm-4">

                <div class="box same-height">

                    <div class="icon">

                        <i class="fa fa-heart"></i>

                    </div>

                    <h3><a href="#"><?php echo $box_title; ?></a></h3>

                    <p> <?php echo $box_desc; ?> </p>

                </div>

            </div>

            <?php    } ?>

        </div>

    </div>

</div> -->
<div id="hot">

    <div class="box">

        <div class="container">

            <div class="col-md-12">

                <h2>
                    Popular products
                </h2>

            </div>

        </div>

    </div>

</div>

<div id="content" class="container">

    <div class="row">

        <?php 
           
          get_popular_products();
           
           ?>

    </div>

</div>


<div id="hot">

    <div class="box">

        <div class="container">

            <div class="col-md-12">

                <h2>
                    <?php echo $home[$language][1];?>
                </h2>

            </div>

        </div>

    </div>

</div>

<div id="content" class="container">

    <div class="row">

        <?php 
           
           getPro();
           
           ?>

    </div>

</div>

<div id="hot" class="hidden-xs">

    <div class="box">

        <div class="container">

            <div class="col-md-12">

                <h2>
                    <?php echo $home[$language][2];?>
                </h2>

            </div>

        </div>

    </div>

</div>

<div id="content" class="container hidden-xs">

    <div class="row">

        <?php 
           
           getbrands();
           
           ?>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="js/bootstrap-v533.min.js"></script>

<?php 
    
    include("includes/footer.php");
    
    ?>