<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Add Sells
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> Add Sell
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                           choose Product
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                        <select name="product_id" class="form-control">
                            <option disabled selected>Choose a product</option>
                            <?php 
                                $get_products = "SELECT * FROM products";
                                $run_products = mysqli_query($con, $get_products);
                                while ($row_products = mysqli_fetch_array($run_products)) {
                                    $product_id = $row_products['product_id'];
                                    $product_title = $row_products['product_title'];
                                    $product_price = $row_products['product_price'];
                                    $product_img1 = $row_products['product_img1'];
                                    echo "<option value='$product_id'>
                                        <img src='product_images/$product_img1' width='50px' height='50px' style='border-radius: 50%; vertical-align: middle;'> 
                                        $product_title - Rs. $product_price
                                    </option>";
                                }
                            ?>
                        </select>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                           Sells Price
                        
                        </label><!-- control-label col-md-3 finish -->
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="product_price" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->

                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="submit" value="Add Sell" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

if(isset($_POST['submit'])){

    $product_id = $_POST['product_id'];
    $product_price = $_POST['product_price'];

    $insert_sell = "insert into sells (product_id,sell_price) values ('$product_id','$product_price')";
    $run_sell = mysqli_query($con,$insert_sell);

    if($run_sell){

        echo "<script>alert('Sell has been inserted sucessfully')</script>";

    }
}


?>

<?php } ?>