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
                    Register
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
                    <div style="text-align:center">

                        <h2><?php echo $costumer_register[$language][0]; ?></h2>
                    </div>

                </div>
                <h2 id="hot"></h2>

                <form action="customer_register.php" method="GET">

                    <div class="form-group">

                        <label><?php echo $costumer_register[$language][1];?></label>

                        <input type="text" class="form-control" name="c_name" required pattern="[a-zA-Z ]+" title="Invalid name format. Only letters and spaces are allowed.">

                    </div>

                    <div class="form-group">

                        <label> <?php echo $costumer_register[$language][2];?></label>
                        <input type="email" class="form-control" name="c_email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Invalid email address"  >
                        <small id="emailHelp" class="form-text text-muted"></small>

                    </div>

                    <div class="form-group">
                        <label> <?php echo $costumer_register[$language][3]; ?></label>
                        <input type="password" class="form-control" name="c_pass" required id="pass" minlength="8"
                            style="width:100%" oninput="checkPasswordStrength(this.value)"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            onfocusout="checkPasswordStrength(this.value)">
                        <div class="input-group-append" style="cursor:pointer">
                            <div class="input-group-text">
                                <input type="checkbox" onclick="togglePassword('pass')"> Show Password
                            </div>
                        </div>
                        <small id="passwordFeedback" class="form-text"></small> <!-- Feedback message -->
                    </div>

                    <script>
                    function checkPasswordStrength(password) {
                        var strength = 0;

                        // Increment strength for matching criteria
                        if (password.match(/[a-z]/)) strength++;
                        if (password.match(/[A-Z]/)) strength++;
                        if (password.match(/[0-9]/)) strength++;
                        if (password.match(/[^a-zA-Z0-9]/)) strength++;

                        // Get the feedback element
                        var message = document.getElementById("passwordFeedback");

                        // Evaluate and display the password strength
                        if (password.length < 8) {
                            message.innerHTML = "Password must be at least 8 characters long.";
                            message.style.color = "red";
                        } else if (strength === 1) {
                            message.innerHTML = "Password is very weak.";
                            message.style.color = "red";
                        } else if (strength === 2) {
                            message.innerHTML = "Password is weak.";
                            message.style.color = "orange";
                        } else if (strength === 3) {
                            message.innerHTML = "Password is moderate.";
                            message.style.color = "blue";
                        } else if (strength >= 4) {
                            message.innerHTML = "Password is strong.";
                            message.style.color = "green";
                        }
                    }

                    function togglePassword(id) {
                        var passwordInput = document.getElementById(id);
                        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
                    }
                    </script>


                    <div class="form-group">
                        <label><?php echo $costumer_register[$language][4];?></label>
                        <input type="number" class="form-control" name="c_contact" required pattern="[0-9]{10}" maxlength="10">

                    </div>
                    <div class="form-group">
                        <label class="form-label"><?php echo $costumer_register[$language][5];?></label>
                        <select name="province" class="form-control form-control-md" id="province"></select>
                        <input type="hidden" class="form-control form-control-md" name="province_text"
                            id="province-text" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><?php echo $costumer_register[$language][6];?></label>
                        <select name="district" class="form-control form-control-md" id="district"></select>
                        <input type="hidden" class="form-control form-control-md" name="district_text"
                            id="district-text" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><?php echo $costumer_register[$language][7];?></label>
                        <select name="Rural_municipality" class="form-control form-control-md"
                            id="Rural_municipality"></select>
                        <input type="hidden" class="form-control form-control-md" name="Rural_municipality-text"
                            id="Rural_municipality-text" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label"><?php echo $costumer_register[$language][8];?></label>
                        <select name="ward_no" class="form-control form-control-md" id="ward_no"></select>
                        <input type="hidden" class="form-control form-control-md" name="ward_no-text" id="ward_no-text"
                            required>
                    </div>
                    <div class="form-group">
                        <label><?php echo $costumer_register[$language][9];?></label>

                        <input type="file" class="form-control form-height-custom" name="c_image" required>

                    </div>

                    <div class="text-center">

                        <button type="submit" name="register" class="btn btn-primary">

                            <i class="fa fa-user-md"></i> <?php echo $costumer_register[$language][10];?>

                        </button>

                        <div class="text-center social-btn" style="margin: 20px 0; padding: 10px;">
                            <a href="https://www.facebook.com/v3.11/dialog/oauth?client_id=1053757518431145&redirect_uri=http://localhost/karnalibazar/customer/fb_login.php&state=5b5f7f5f5f5f5f5f5f5f5f5f5f"
                                class="btn btn-primary" style="margin-right: 10px;"><i class="fa fa-facebook"></i>
                                Register
                                with Facebook</a>
                            <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=profile%20email%20https://www.googleapis.com/auth/userinfo.profile%20https://www.googleapis.com/auth/userinfo.email&access_type=online&include_granted_scopes=true&response_type=code&state=state_parameter_passthrough_value&redirect_uri=http://localhost/shop/customer/gg_register.php&client_id=869224076856-tv9ebdp83vu6jsjs4st21ifd80qjd2db.apps.googleusercontent.com"
                                class="btn btn-danger"><i class="fa fa-google"></i> Register with Google</a>
                        </div>
                        <p class="text-muted"> <?php echo $costumer_register[$language][11];?></p>

                    </div>

                </form>
            </div>

        </div>

    </div>

</div>
</div>
<script src="js/address-selector.js"></script>

<script src="js/jquery-331.min.js"></script>

<script src="js/bootstrap-v533.min.js"></script>
<?php
include("includes/footer.php");

if (isset($_GET['register'])) {
    // Get data from form
    $c_name = $_GET['c_name'];
    $c_email = $_GET['c_email'];
    $c_pass = $_GET['c_pass'];
    $c_contact = $_GET['c_contact'];
    $c_province = $_GET['province_text'];
    $c_district = $_GET['district_text'];
    $c_Rural_municipality = $_GET['Rural_municipality-text'];
    $C_ward_no = $_GET['ward_no-text'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealIpUser();

    // Debug: Check form data
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    

    // Check if required fields are empty
    if (empty($c_name) || empty($c_email) || empty($c_pass) || empty($c_contact) || empty($c_province) || empty($c_district) || empty($c_Rural_municipality) || empty($C_ward_no)) {
        echo "<script>alert('Please fill all required fields.')</script>";
        exit;
    }
    if (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.')</script>";
        exit;
    }

    // Check if email already exists
    $check_email = "SELECT * FROM customers WHERE customer_email='$c_email'";
    $run_email = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_email) > 0) {
        echo "<script>
        document.getElementById('emailHelp').innerHTML = 'Email already exists.';
        document.getElementById('emailHelp').style.color = 'red';
        </script>";
        exit;
    }
    $c_image = array_rand(array_flip(['mypic.jpg', 'member1.jpg', 'erika.jpg']));

    // Move uploaded image to the desired directory
    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

    // Insert data into database
    $insert_customer = "INSERT INTO customers 
        (customer_name, customer_email, customer_pass, customer_contact, customer_province, customer_district, customer_Rural_municipality, customer_word_no, customer_image, customer_ip) 
        VALUES 
        ('$c_name', '$c_email', '$c_pass', '$c_contact', '$c_province', '$c_district', '$c_Rural_municipality', '$C_ward_no', '$c_image', '$c_ip')";

    // Debug: Check the query
    echo "<pre>";
    echo $insert_customer;
    echo "</pre>";

    $run_customer = mysqli_query($con, $insert_customer);

    // Check if the query was successful
    if ($run_customer) {
        echo "<script>alert('You have been Registered Successfully')</script>";
        echo "<script>window.open('checkout.php', '_self')</script>";
    } else {
        echo "<script>alert('Registration failed: " . mysqli_error($con) . "')</script>";
    }
}
?>