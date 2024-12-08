<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['vendor_email'])){
        
        header('Location: login.php');
        exit();
        
    }else{
        
        $vendor_session = $_SESSION['vendor_email'];
        
        $get_vendor = "select * from vendors where vendor_email='$vendor_session'";
        
        $run_vendor = mysqli_query($con,$get_vendor);
        
        $row_vendor = mysqli_fetch_array($run_vendor);
        
        $vendor_id = $row_vendor['vendor_id'];
        
        $vendor_name = $row_vendor['vendor_name'];
        
        $vendor_email = $row_vendor['vendor_email'];
        
        $vendor_image = $row_vendor['vendor_image'];
        
        $vendor_country = $row_vendor['vendor_province'];
        
        $vendor_contact = $row_vendor['vendor_contact'];
        
        $get_products = "SELECT * FROM products WHERE vendor_id='$vendor_id'";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_customers = "select * from customers";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from product_categories";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        
        $get_income = "select * from payments";
        
        $run_income = mysqli_query($con,$get_income);
        
        $row_income = mysqli_fetch_array($run_income);

        $count_payment= mysqli_num_rows($run_income);

        $all_income = 0;
        while($row_income = mysqli_fetch_array($run_income)){
            $amount = $row_income['amount'];
            $all_income += $amount;
        }
        if ($all_income > 1000) {
                $total_income = $all_income / 1000;
                $total_income = (int)$total_income;
                $total_income = number_format($total_income,0);
                $total_income .= 'K';
            }
            else{
                $total_income = $all_income;
            }
        
        $get_pending_orders = "select * from pending_orders";
        
        $run_pending_orders = mysqli_query($con,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);

?>

<?php include("includes/header.php"); ?>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['insert_product'])){
                        
                        include("insert_product.php");
                        
                }   if(isset($_GET['view_products'])){
                        
                        include("view_products.php");
                        
                }   if(isset($_GET['delete_product'])){
                        
                        include("delete_product.php");
                        
                }   if(isset($_GET['edit_product'])){
                        
                        include("edit_product.php");
                        
                }   if(isset($_GET['insert_p_cat'])){
                        
                        include("insert_p_cat.php");
                        
                }   if(isset($_GET['view_p_cats'])){
                        
                        include("view_p_cats.php");
                        
                }   if(isset($_GET['delete_p_cat'])){
                        
                        include("delete_p_cat.php");
                        
                }   if(isset($_GET['edit_p_cat'])){
                        
                        include("edit_p_cat.php");
                        
                }   if(isset($_GET['insert_cat'])){
                        
                        include("insert_cat.php");
                        
                }   if(isset($_GET['view_cats'])){
                        
                        include("view_cats.php");
                        
                }   if(isset($_GET['edit_cat'])){
                        
                        include("edit_cat.php");
                        
                }   if(isset($_GET['delete_cat'])){
                        
                        include("delete_cat.php");
                        
                }   if(isset($_GET['insert_slide'])){
                        
                        include("insert_slide.php");
                        
                }   if(isset($_GET['view_slides'])){
                        
                        include("view_slides.php");
                        
                }   if(isset($_GET['delete_slide'])){
                        
                        include("delete_slide.php");
                        
                }   if(isset($_GET['edit_slide'])){
                        
                        include("edit_slide.php");
                        
                }   if(isset($_GET['insert_box'])){
                        
                        include("insert_box.php");
                        
                }   if(isset($_GET['view_boxes'])){
                        
                        include("view_boxes.php");
                        
                }   if(isset($_GET['delete_box'])){
                        
                        include("delete_box.php");
                        
                }   if(isset($_GET['edit_box'])){
                        
                        include("edit_box.php");
                        
                }   if(isset($_GET['view_customers'])){
                        
                        include("view_customers.php");
                        
                }   if(isset($_GET['delete_customer'])){
                        
                        include("delete_customer.php");
                        
                }   if(isset($_GET['view_orders'])){
                        
                        include("view_orders.php");
                        
                }   if(isset($_GET['delete_order'])){
                        
                        include("delete_order.php");
                        
                }   if(isset($_GET['view_payments'])){
                        
                        include("view_payments.php");
                        
                }   if(isset($_GET['delete_payment'])){
                        
                        include("delete_payment.php");
                        
                }   if(isset($_GET['view_users'])){
                        
                        include("view_users.php");
                        
                }   if(isset($_GET['delete_user'])){
                        
                        include("delete_user.php");
                        
                }   if(isset($_GET['insert_user'])){
                        
                        include("insert_user.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        
                }   if(isset($_GET['insert_terms'])){
                        
                        include("insert_terms.php");
                        
                }   if(isset($_GET['view_terms'])){
                        
                        include("view_terms.php");
                        
                }   if(isset($_GET['delete_term'])){
                        
                        include("delete_term.php");
                        
                }   if(isset($_GET['edit_term'])){
                        
                        include("edit_term.php");
                        
                }   if(isset($_GET['edit_css'])){
                        
                        include("edit_css.php");
                        
                }   if(isset($_GET['insert_manufacturer'])){
                        
                        include("insert_manufacturer.php");
                        
                }   if(isset($_GET['view_manufacturers'])){
                        
                        include("view_manufacturers.php");
                        
                }   if(isset($_GET['delete_manufacturer'])){
                        
                        include("delete_manufacturer.php");
                        
                }   if(isset($_GET['edit_manufacturer'])){
                        
                        include("edit_manufacturer.php");
                        
                }
                if(isset($_GET['add_sell'])){
                        
                        include("add_sell.php");
                        
                }
                if(isset($_GET['view_sell'])){
                        
                        include("view_sell.php");
                        
                }
                if(isset($_GET['delete_sell'])){
                        
                        include("delete_sell.php");
                        
                }
                if(isset($_GET['view_delivery_address'])){
                        
                        include("view_delivery_address.php");
                      
                        
                }

                if(isset($_GET['delete_delivery_address'])){
                        
                        include("delete_delivery_address.php");
                        
                }
        
                ?>
                 
               
                
               
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>       
</body>
</html>


<?php } ?>