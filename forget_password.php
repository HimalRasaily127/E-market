<?php 
$active='Forget Password';
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
                    Forget Password
                </li>
            </ul>

        </div>

        <div class="col-md-3 hidden-xs">

            <?php 
    
    include("includes/sidebar.php");
    
    ?>

        </div>

        <div class="col-md-9">

            <div class="box" >
                <div class="box-header" >
                    <center>

                        <h1> forget_password your password</h1>

                        <p class="lead">give your email to recover your password</p>

                        <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. </p>

                    </center>

                </div>

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                    <div class="form-group" >
                        <label> Email </label>

                        <input name="c_email" type="text" class="form-control" required>

                    </div>

                    <div class="text-center">
                         <button name="submit" value="Login" class="btn btn-primary" >
                          <i class="fa fa-sign-in">
                        </i> Submit 



                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</div>

<?php
// Include PHPMailer files
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['submit'])) {
    if (empty($_POST['c_email'])) {
        echo "<script>alert('Please enter your email address')</script>";
    } else {
        $customer_email = $_POST['c_email'];
        // Check if email exists in your database
        $select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
        $run_customer = mysqli_query($con, $select_customer);
        $check_customer = mysqli_num_rows($run_customer);

        if ($check_customer == 0) {
            echo "<script>alert('Email address not found in our database')</script>";
        } else {
            // Generate OTP
            $otp = rand(10000, 99999);

            // Create PHPMailer object
            $mail = new PHPMailer(true);

            try {
                // SMTP settings
                $mail->isSMTP();                                // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';            // Set the SMTP server to Gmail
                $mail->SMTPAuth   = true;                        // Enable SMTP authentication
                $mail->Username   = 'himalrasaily965@gmail.com';      // Your Gmail address
                $mail->Password   = 'HIAML@12345';       // Your Gmail password or App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
                $mail->Port       = 587;                         // TCP port to connect to

                // Sender and recipient settings
                $mail->setFrom('himalrasaily965@gmail.com', 'Online Kaernali Bazar'); // From email
                $mail->addAddress($customer_email);  // Add recipient email address

                // Email subject and body content
                $mail->isHTML(true);
                $mail->Subject = 'OTP for password recovery';
                $mail->Body    = "<h2>OTP for password recovery: $otp</h2><p>Please enter the OTP below to recover your password.</p>";

                // Send email
                $mail->send();

                // Store OTP in session and redirect to OTP verification page
                $_SESSION['otp'] = $otp;
                $_SESSION['customer_email'] = $customer_email;

                echo "<script>window.open('verify_otp.php', '_self')</script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}
?>

