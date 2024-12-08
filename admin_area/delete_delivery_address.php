<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_delivery_address'])){
        
        $reciver_id = $_GET['delete_delivery_address'];
        
        $delete_box = "delete from order_reciver_details where customer_id='$reciver_id'";
        
        $run_delete_box = mysqli_query($con,$delete_box);
        
        if($run_delete_box){
            
            echo "<script>alert('This Reciver Informatio Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_delivery_address','_self')</script>";
            
        }
        
    }

?>




<?php } ?>