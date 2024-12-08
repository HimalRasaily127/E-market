<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_contact = $row_customer['customer_contact'];

$customer_province = $row_customer['customer_province'];

$customer_district = $row_customer['customer_district'];

$customer_rural_municipality = $row_customer['customer_Rural_municipality'];

$customer_ward_no = $row_customer['customer_word_no'];

$customer_image = $row_customer['customer_image'];

?>

<h1 align="center"> Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        
        <label> Costumer Name: </label>
        
        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>
        
    </div>
    
    <div class="form-group">
        
        <label> Costumer Email: </label>
        
        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>
        
    </div>
    
    <div class="form-group">
        
        <label> Costumer Contact: </label>
        
        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>
        
    </div>
    
    <div class="form-group">
        <label class="form-label">province *</label>
        <input type="text" class="form-control form-control-md" name="province_text" id="province-text" required value="<?php echo $customer_province ; ?>">
    </div>
    <div class="form-group">
        <label class="form-label">district *</label>
        
        <input type="text" class="form-control form-control-md" name="district_text" id="district-text" value="<?php echo $customer_district ; ?>"required>
    </div>
    <div class="form-group">
        <label class="form-label">Rural_municipality / Municipality *</label>
        <input type="text" class="form-control form-control-md" name="Rural_municipality-text" id="Rural_municipality-text"value="<?php echo $customer_rural_municipality ; ?>" required>
    </div>
    <div class="form-group">
        <label class="form-label">ward_no *</label>
        <input type="text" class="form-control form-control-md" name="ward_no-text" id="ward_no-text" value="<?php echo $customer_ward_no ; ?>" required>
    </div>
    <div class="form-group">
        
        <label> Costumer Image: </label>
        
        <input type="file" name="c_image" class="form-control form-height-custom">
        
        <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Costumer Image">
        
    </div>
    
    <div class="text-center">
        
        <button name="update" class="btn btn-primary">
            
            <i class="fa fa-user-md"></i> Update Now
            
        </button>
        
    </div>
    
</form>

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_contact = $_POST['c_contact'];

    $c_province = $_POST['province_text'];
    
    $c_districy = $_POST['district_text'];
    
    $c_rural_municipality = $_POST['Rural_municipality-text'];

    $c_ward_no = $_POST['ward_no-text'];
    
    $c_image = $_FILES['c_image']['name'];
    
    if(empty($c_name) or empty($c_email) or empty($c_contact) or empty($c_province) or empty($c_districy) or empty($c_rural_municipality) or empty($c_ward_no)){
        
        echo "<script>alert('Please fill all the fields')</script>";
        
        exit();
        
    }
    
    if(!filter_var($c_email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Invalid email')</script>";
        exit();
    }
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_contact='$c_contact',customer_province='$c_province',customer_district='$c_districy',customer_Rural_municipality='$c_rural_municipality',customer_word_no='$c_ward_no',customer_image='$c_image' where customer_id='$update_id' ";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    else{
        echo "<script>alert('Something went wrong')</script>";
    }
    
}

?>
