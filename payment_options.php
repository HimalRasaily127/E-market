<div class="box">
   
   <?php 
    
    $session_email = $_SESSION['customer_email'];
    
    $select_customer = "select * from customers where customer_email='$session_email'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];
    
    ?>
    
    <h1 class="text-center">Payment Options For You</h1>  
    
     <p class="lead text-center">
         
         <a href="order.php?c_id=<?php echo $customer_id ?>" >
         <input type="button" value="Cash On Deslivery" class="btn btn-primary" name="cash"></a>
    
     </p>
     
     <center>         
        <p class="lead">
            
            <img src="images/e-sewa.png" alt=" E-sewa " style="width: 150px;" class="img-responsive"> 
            <a href="customer/confirm.php?c_id=<?php echo $customer_id ?>">
                    <input value="E-sewa pay" type="submit" class="btn btn-success" name="e-sewa" onmouseover="this.title='This Service is Not Available Now'" onmouseout="this.title=''">
                </form>
                
            </a>
            
        </p> 
         
     </center>
    
</div>
