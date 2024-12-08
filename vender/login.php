<?php 

    session_start();
    include("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Kaernali Bazar vendor Area || vendor login</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/logo-d-1 copy.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Sellers Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="vendor_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="vendor_pass" required>
           
           <button type="submit" class="btn btn-lg btn-danger btn-block" name="vender_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
           <a href="forgot.php?forgot_pass" class=" btn btn-lg btn-primary btn-block">Forgot Password</a>
           <p style="color:white; font-size:18px;" class="text-center"> Don't have an account? <a style="color:white;" href="../seller_register.php">Register</a></p>
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>

<?php 

  if(isset($_POST['vender_login'])){

      $vendor_email = $_POST['vendor_email'];
      $vendor_pass = $_POST['vendor_pass'];

      $select_vendor = "SELECT * FROM vendors WHERE vendor_email='$vendor_email' AND vendor_pass='$vendor_pass'";

      $run_vendor = mysqli_query($con,$select_vendor);

      $check_vendor = mysqli_num_rows($run_vendor);

      if($check_vendor == 1){

          $row_vendor = mysqli_fetch_array($run_vendor);
          $vendor_status = $row_vendor['vendor_status'];
          
          if($vendor_status == 'inactive'){
              echo "<script>
              alert('Your account is inactive. Please contact admin.');
              window.open('../admin_contact.php','_self');
              </script>";
          } else {
              $_SESSION['vendor_email'] = $vendor_email;
              echo "<script>
              alert('You are logged in');
              window.open('index.php?dashboard','_self');
              </script>";
          }
          
      } else {
          echo "<script>alert('Email or Password is wrong')</script>";
          echo "<script>window.open('login.php','_self')</script>";
      }
  }

?>

