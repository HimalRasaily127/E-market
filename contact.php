<?php 
    
    $active='Contact';
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
                       Contact Us
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-3 hidden-xs">
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div>

           <div class="col-md-9">
               
               <div class="box">

                   <div class="box-header">
                       
                       <center>
                           
                           <h2> Feel free to Contact Us</h2>
                           
                           <p class="text-muted">
                               
                               If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
                               
                           </p>
                           
                       </center>
                       
                       <form action="contact.php" method="post">
                           
                           <div class="form-group">
                               
                               <label>Name</label>
                               
                               <input type="text" class="form-control" name="name" required>
                               
                           </div>
                           
                           <div class="form-group">
                               
                               <label>Email</label>
                               
                               <input type="text" class="form-control" name="email" required>
                               
                           </div>
                           
                           <div class="form-group">
                               
                               <label>Subject</label>
                               
                               <input type="text" class="form-control" name="subject" required>
                               
                           </div>
                           
                           <div class="form-group">
                               
                               <label>Message</label>
                               
                               <textarea name="message" class="form-control"></textarea>
                               
                           </div>
                           
                           <div class="text-center">
                               
                               <button type="submit" name="submit" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Send Message
                               
                               </button>
                               
                           </div>
                           
                       </form>
                       
                       <?php 
                       
                       if(isset($_POST['submit'])){
                           
                           /// Admin receives message with this ///
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           
                           $receiver_email = "himalrasaily956@gmail.com";
                           
                           mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
                           
                           /// Auto reply to sender with this ///
                           
                           $email = $_POST['email'];
                           
                           $subject = "Welcome to my website";
                           
                           $msg = "Thanks for sending us message. ASAP we will reply your message";
                           
                           $from = "himalrasaily956@gmail.com";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<h2 align='center'> Your message has sent sucessfully </h2>";
                           
                       }
                       
                       ?>
                       
                   </div>
                   
               </div>
               
           </div>
           
       </div>
   </div>
   
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   
   <script src="js/bootstrap-v533.min.js"></script>
   <?php 
    
    include("includes/footer.php");
    
    ?>

