<div class="box">
    
  <div class="box-header">
      
      <center>
          
          <h1> <?php echo $costumer_login[$language][0];?></h1>
          
          <p class="lead"> <?php echo $costumer_login[$language][1];?></p>
          
          <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. Laudantium omnis, ullam, fuga officia provident error corporis consectetur aliquid corrupti recusandae minus ipsam quasi. Perspiciatis nemo, nostrum magni odit! </p>
          
      </center>
      
  </div>
   
  <form method="GET" action="checkout.php">
      
      <div class="form-group">
          
          <label> <?php echo $costumer_login[$language][2];?> </label>
          
          <input name="c_email" type="text" class="form-control" required>
          
      </div>
      
       <div class="form-group">
          
          <label> <?php echo $costumer_login[$language][3];?> </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div>
      
      <div class="text-center">
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> <?php echo $costumer_login[$language][4];?>
              
          </button>
          
      </div>
      
      <hr class="dotted">
      
      <div class="text-center">
          
          <a href="forget_password.php"> <?php echo $costumer_login[$language][6];?> </a>
          
      </div>
      <br>
      <div class="text-center">
          
          <a href="https://www.facebook.com/v3.11/dialog/oauth?client_id=1053757518431145&redirect_uri=http://localhost/karnalibazar/customer/fb_login.php&state=5b5f7f5f5f5f5f5f5f5f5f5f5f" class="btn btn-primary">
              
              <i class="fa fa-facebook"></i> Login with Facebook
              
          </a>
          
          <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=https://www.googleapis.com/auth/userinfo.email&access_type=online&include_granted_scopes=true&response_type=code&state=state_parameter_passthrough_value&redirect_uri=http://localhost/shop/customer/gg_login.php&client_id=869224076856-tv9ebdp83vu6jsjs4st21ifd80qjd2db.apps.googleusercontent.com" class="btn btn-danger">
              
              <i class="fa fa-google"></i> Login with Google
              
          </a>
          
      </div>
      
  </form>
   
  <center>
      
     <a href="customer_register.php">
         
         <h3> <?php echo $costumer_login[$language][5];?> </h3>
         
     </a> 
      
  </center>
    
</div>

<?php

include("includes/db.php");

if (isset($_GET['login'])) {
    // Get and sanitize user inputs
    $customer_email = mysqli_real_escape_string($con, $_GET['c_email']);
    $customer_pass = mysqli_real_escape_string($con, $_GET['c_pass']);

    // Query to fetch customer details
    $select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
    $run_customer = mysqli_query($con, $select_customer);

    if ($run_customer && mysqli_num_rows($run_customer) > 0) {
        // Fetch the customer's data
        $row_customer = mysqli_fetch_assoc($run_customer);
        $db_password = $row_customer['customer_pass']; // Password from database

        // Verify the password
        if (password_verify($customer_pass, $db_password) || $customer_pass === $db_password) {
            $_SESSION['customer_email'] = $customer_email;

            // Check if the cart has items
            $get_ip = getRealIpUser();
            $select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip'";
            $run_cart = mysqli_query($con, $select_cart);
            $check_cart = mysqli_num_rows($run_cart);

            if ($check_cart == 0) {
                echo "<script>alert('You are Logged in')</script>";
                echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";
            } else {
                echo "<script>alert('You are Logged in')</script>";
                echo "<script>window.open('order_address.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Incorrect password.')</script>";
        }
    } else {
        echo "<script>alert('No account found with this email.')</script>";
    }
}
?>

