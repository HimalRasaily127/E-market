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
                    Seller Register
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
                        <h2>Seller Register</h2>
                    </div>

                </div>
                <h2 id="hot"></h2>

                <form action="seller_register.php" method="GET" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Vendor Name</label>

                        <input type="text" class="form-control" name="v_name" required>

                    </div>

                    <div class="form-group">
                        <label> Email Address</label>

                        <input type="text" class="form-control" name="v_email" required>

                    </div>

                    <div class="form-group">
                        <label> Password</label>
                        <input type="password" class="form-control" name="v_pass" required id="pass" minlength="8"
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
                        <label>Contact</label>
                        <input type="text" class="form-control" name="v_contact" required>

                    </div>
                    <div class="form-group">
                        <label class="form-label">Province </label>
                        <select name="province" class="form-control form-control-md" id="province"></select>
                        <input type="hidden" class="form-control form-control-md" name="province_text"
                            id="province-text" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">District</label>
                        <select name="district" class="form-control form-control-md" id="district"></select>
                        <input type="hidden" class="form-control form-control-md" name="district_text"
                            id="district-text" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Rural_municipality / Municipality</label>
                        <select name="Rural_municipality" class="form-control form-control-md"
                            id="Rural_municipality"></select>
                        <input type="hidden" class="form-control form-control-md" name="Rural_municipality-text"
                            id="Rural_municipality-text" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ward_no</label>
                        <select name="ward_no" class="form-control form-control-md" id="ward_no"></select>
                        <input type="hidden" class="form-control form-control-md" name="ward_no-text" id="ward_no-text"
                            required>
                    </div>
                    <div class="form-group">
                        <lable>Business Logo/Image</lable>
                        <input type="file" class="form-control form-height-custom" name="v_image" required>
                    </div>
                    <div class="form-group">
                        <label>Category of Products</label>

                        <select name="v_category" class="form-control" required>

                            <option disabled selected value> -- select an option -- </option>

                            <?php

                            $get_p_cats = "select * from product_categories";

                            $run_p_cats = mysqli_query($con, $get_p_cats);

                            while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                                
                                $p_cat_id = $row_p_cats['p_cat_id'];
                                $p_cat_title = $row_p_cats['p_cat_title'];
                                echo "<option value='$p_cat_title'> $p_cat_title </option>";
                                
                            }
                            ?>
                        </select>


                    </div>
                    <div class="form-group">
                        <label>Description (brief business bio)</label>

                        <textarea name="v_bio" class="form-control" rows="6" cols="18"></textarea>

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="v_term" value="" id="invalidCheck"
                            required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to <a href="#">terms and conditions</a>
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting. and read our <a href="#">terms and conditions</a>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="register" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Submit
                        </button>

                        <div class="text-center social-btn" style="margin: 20px 0; padding: 10px;">
                            <a href="https://www.facebook.com/v3.11/dialog/oauth?client_id=1053757518431145&redirect_uri=http://localhost/karnalibazar/customer/fb_login.php&state=5b5f7f5f5f5f5f5f5f5f5f5f5f"
                                class="btn btn-primary" style="margin-right: 10px;"><i class="fa fa-facebook"></i>
                                Register
                                with Facebook</a>
                            <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=profile%20email%20https://www.googleapis.com/auth/userinfo.profile%20https://www.googleapis.com/auth/userinfo.email&accesv_type=online&include_granted_scopes=true&response_type=code&state=state_parameter_passthrough_value&redirect_uri=http://localhost/shop/customer/gg_register.php&client_id=869224076856-tv9ebdp83vu6jsjs4st21ifd80qjd2db.apps.googleusercontent.com"
                                class="btn btn-danger"><i class="fa fa-google"></i> Register with Google</a>
                        </div>
                        <p class="text-muted">I am already a vender ? <a href="vender/login.php">Login</a></p>

                    </div>

                </form>
            </div>

        </div>

    </div>

</div>
<script src="js/address-selector.js"></script>

<script src="js/jquery-331.min.js"></script>

<script src="js/bootstrap-v533.min.js"></script>
<?php include("includes/footer.php");

if (isset($_GET['register'])) {

    $v_name = $_GET['v_name'];
    $v_email = $_GET['v_email'];
    $v_pass = $_GET['v_pass'];
    $v_contact = $_GET['v_contact'];
    $v_province = $_GET['province_text'];
    $v_districy = $_GET['district_text'];
    $V_rural_municipality = $_GET['Rural_municipality-text'];
    $v_ward = $_GET['ward_no-text'];
    $v_image = $_FILES['v_image']['name'];
    $v_image_tmp = $_FILES['v_image']['tmp_name'];
    $v_status = "inactive";
    $v_category = $_GET['v_category'];
    $v_bio = $_GET['v_bio'];
    $v_ip = $_SERVER['REMOTE_ADDR'];

    if (!isset($_GET['v_term'])) {
        echo "<script>alert('You must accept the terms and conditions to register.')</script>";
        exit();
    }
    

    $check_email = "SELECT * FROM vendors WHERE vendor_email='$v_email'";
    $run_check = mysqli_query($con, $check_email);

    if (mysqli_num_rows($run_check) > 0) {
        echo "<script>alert('Email already exists')</script>";
        exit();
    }
    $v_image =array_rand(array_flip(['vendor1.png', 'vendor2.png', 'vendor3.png','vendor3.jpg']));

    move_uploaded_file($v_image_tmp, "vender/vender_image/$v_image");

    $insert_seller = "INSERT INTO `vendors`(`vendor_name`, `vendor_email`, `vendor_pass`, `vendor_contact`, `vendor_province`, `vendor_district`, `vendor_Rural_municipality`, `vendor_word_no`, `vendor_image`, `vendor_ip`, `vendor_category`, `vendor_bio`, `created_at`, `status`) VALUES ('$v_name','$v_email','$v_pass','$v_contact','$v_province','$v_districy','$V_rural_municipality','$v_ward','$v_image','$v_ip','$v_category','$v_bio',NOW(),'$v_status')";

    $run_seller = mysqli_query($con, $insert_seller);

    if ($run_seller) {

        echo "<script>alert('You have been registered successfully. Please wait for admin approval.')</script>";


        echo "<script>window.open('vender/login.php','_self')</script>";

    } else {
        echo "<script>alert('Error while registering')</script>";

    }

}