<?php 
    
    if(!isset($_SESSION['admin_email'])){

        echo "<script>alert('You have not promision by Admin!')</script>";
        echo "<script>window.open('index.php?dashboard','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_manufacturer'])){
        
        $delete_id = $_GET['delete_manufacturer'];
        
        $delete_manufacturer = "delete from manufacturers where manufacturer_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_manufacturer);
        
        if($run_delete){
            
            echo "<script>alert('One of your manufacturer has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
            
        }
        
    }

?>

<?php } ?>