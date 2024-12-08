<center>
    
    <h1> Do You Realy Want To Cancel Your Order ? </h1>
    
    <form action="" method="GET">
        
       <input type="submit" name="Yes" value="Yes, I Want To cancel order" class="btn btn-danger"> 
       <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
       
       <input type="submit" name="No" value="No, I Dont Want To cancel" class="btn btn-primary"> 
        
    </form>
    
</center>


<?php 

if(isset($_GET['Yes'])){

    $order_id = $_GET['order_id'];

    $delete_order = "DELETE FROM customer_orders WHERE order_id='{$order_id}'";
    
    $delete_pandding_order="DELETE FROM pending_orders WHERE order_id='{$order_id}'";
    
    $run_delete = mysqli_query($con,$delete_order) or die(mysqli_error($con));
    
    $run_deleted = mysqli_query($con,$delete_pandding_order) or die(mysqli_error($con));


    
    if($run_delete){
        
        echo "<script>alert('Your order has been Deleted')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    }
    
if(isset($_GET['No'])){
    
    echo "<script>alert('Your order is safe.')</script>";
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}



