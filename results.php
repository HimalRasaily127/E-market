<?php
$active='Home';
include("includes/header.php");
?>
<div id="content">
   <div class="container">
       <div class="col-md-12">
           
           <ul class="breadcrumb">
               <li>
                   <a href="index.php">Home</a>
               </li>
               <li>
                   Search Results
               </li>
           </ul>
           
       </div>
       
       <div class="col-md-3 hidden-xs">

            <?php 
                
                include("includes/sidebar.php");
                
                ?> 
                        
       </div>
       
       <div class="col-md-9">
        <?php
       if(isset($_GET['search'])){
        $search_term = $_GET['user_query'];
        // pagination
        // pagination
        $per_page = 6;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $start = ($page - 1) * $per_page;

        $search_term = mysqli_real_escape_string($db,$search_term);
        $get_products = "SELECT * FROM products WHERE MATCH(product_title, product_desc, product_keywords) AGAINST ('$search_term' IN BOOLEAN MODE) OR (product_title LIKE '%$search_term%' OR product_desc LIKE '%$search_term%' OR product_keywords LIKE '%$search_term%') 
        LIMIT $start, $per_page";

        $result_query = mysqli_query($db,$get_products);

            while($row = mysqli_fetch_array($result_query)){
                $pro_id = $row['product_id'];
                $pro_title = $row['product_title'];
                $pro_price = $row['product_price'];
                $pro_img1 = $row['product_img1'];
        
                echo "
                
                    <div class='col-md-4 col-sm-6' style='style='height:360px;overflow:hidden;'>
        
                        <div class='product'>
        
                            <a href='details.php?pro_id=$pro_id'>
        
                                <img class='img-responsive center-block'style='max-height:200px;max-width:100%; alt='$pro_title' src='admin_area/product_images/$pro_img1'>
        
                            </a>
                            <center>
                            <div class='text'>
        
                                <h3> $pro_title </h3>
        
                                <h4 class='price'>Rs. $pro_price </h4>
                                <p class='buttons'>
        
                                    <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>View Details</a>
                                    <a class='btn btn-danger' href='details.php?pro_id=$pro_id'>
                                    
                                        <i class='fa fa-shopping-cart'></i> Add To Cart 
                                    
                                    </a>
        
                                </p>
        
                            </div>
        
                            </center>
        
                        </div>
        
                    </div>
        
                
                ";
            }
           
        }
        ?>

           
           </div>
           
           <center>
               <ul class="pagination">

                    <?php getPaginator(); ?>

               </ul>
           </center>
           
       </div>

       <div id="wait" style="position:absolute;top:40%;left:45%;padding: 200px 100px 100px 100px;"></div>
       
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
<script src="js/bootstrap-v533.min.js"></script>

<?php 

include("includes/footer.php");

?>


  
   