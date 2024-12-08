<?php 

    $active='Account';
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
                       Oder Address
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
           
           if(!isset($_SESSION['customer_email'])){
               
               include("customer/customer_login.php");
               
           }else{
            
            $session_email = $_SESSION['customer_email'];
            
            $select_customer = "select * from customers where customer_email='$session_email'";
            
            $run_customer = mysqli_query($con,$select_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            $customer_name = $row_customer['customer_name'];
            $customer_email = $row_customer['customer_email'];
            $customer_contact = $row_customer['customer_contact'];
            $customer_province = $row_customer['customer_province'];
            $customer_district = $row_customer['customer_district'];
            $customer_rural_municipality = $row_customer['customer_Rural_municipality'];
            $customer_ward_no = $row_customer['customer_word_no'];
            
            echo "<h2 class='text-center'>Fill out the form below to Receive information </h2>

               <br><br>

               <div class='box'>

               <form action='order_address.php' method='GET' enctype='multipart/form-data'>

               <div class='form-group '>
                   <label>Receiver Name</label>
                   <input type='text' class='form-control' name='receiver_name' value='$customer_name' required >
               </div>
               
               <div class='form-group '>
                   <label>Receiver Email</label>
                   <input type='text' class='form-control' name='receiver_email' value='$customer_email' required>
               </div>

               <div class='form-group '>
                   <label>Receiver Phone</label>
                   <input type='text' class='form-control' name='receiver_phone' value='$customer_contact' required>
               </div>
               <div class='form-group'>
               <label class='form-label'>Receiver province </label>
                <input type='text' class='form-control form-control-md' name='province_text' id='province-text' value='$customer_province' required>
                </div>
                <div class='form-group'>
                    <label class='form-label'>Receiver district </label>
                        <input type='text' class='form-control form-control-md' name='district_text' id='district-text'value='$customer_district' required>
                </div>
                <div class='form-group'>
                    <label class='form-label'>Receiver Rural_municipality / Municipality </label>
                        <input type='text' class='form-control form-control-md' name='Rural_municipality-text' id='Rural_municipality-text' value='$customer_rural_municipality'  required>
                    </div>
                    <div class='form-group'>
                        <label class='form-label'>Receiver ward_no </label>
                        <input type='text' class='form-control form-control-md' name='ward_no-text' id='ward_no-text'value='$customer_ward_no' required>
                    </div>
                    <div class='form-group'>
                        <label class='form-label'>Received location </label>
                        <input type='text' class='form-control form-control-md' name='location_text' id='location-text' required>
                    </div>

                
               <div class='text-center'>
                   <button type='submit' name='submit' class='btn btn-primary'>
                       <i class='fa fa-user-md'></i> Submit
                   </button>
               </div>
               
               </form>
               
               </div>";
               
           }
           
           ?>
           
           </div>
           <?php
           
           if(isset($_GET['submit'])){
                $customer_id = $customer_id;
               $receiver_name = $_GET['receiver_name'];
               $receiver_email = $_GET['receiver_email'];
               $receiver_phone = $_GET['receiver_phone'];
               $province_text = $_GET['province_text'];
               $district_text = $_GET['district_text'];
               $Rural_municipality_text = $_GET['Rural_municipality-text'];
               $ward_no_text = $_GET['ward_no-text'];
               $location_text = $_GET['location_text'];
               
               $insert_address = "INSERT INTO `order_reciver_details`(`customer_id`, `reciver_name`, `reciver_phone`, `reciver_email`, `reciver_province`, `reciver_district`, `reciver_Rural_municipality`, `reciver_word_no`, `reciver_location`) VALUES  ('$customer_id','$receiver_name','$receiver_phone','$receiver_email','$province_text','$district_text','$Rural_municipality_text','$ward_no_text','$location_text')";
               
               $run_address = mysqli_query($con,$insert_address);
               
               if($run_address){
                   
                   echo "<script>alert('Your address has been submitted, Thank you! please parment your order')</script>";
                   echo "<script>window.open('checkout.php','_self')</script>";
                   
               }
               
           }
           ?>
           
       </div>
   </div>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="js/bootstrap-v533.min.js"></script>
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
   
    
    
</body>
</html>