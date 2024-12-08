<?php

include("includes/db.php");
include("includes/header.php");
$active = "Admin Contact";

?>

<?php
if(!isset($_SESSION['vendor_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}
else{
    

$query = "SELECT * FROM admins ORDER BY admin_id DESC LIMIT 1";
$result = mysqli_query($con, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $admin_name = $row['admin_name'];
    $admin_email = $row['admin_email'];
    $admin_contact = $row['admin_contact'];
    $admin_address = $row['admin_address'];
}

?>


<body>
<div class="container">
    <h2 class="text-center" style="margin-top: 20px;">Admin Contact Details</h2>
    <div class="card shadow p-3 mb-5 bg-white rounded" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title text-center">Admin Contact Information</h4>
        </div>
        <div class="card-body">
            <h4><i class="fa fa-user text-primary mr-2"></i> Name: <?php echo $admin_name; ?></h4>
            <h4><i class="fa fa-envelope text-primary mr-2"></i> Email: <a href="mailto:<?php echo $admin_email; ?>?subject=Query%20from%20Online%20Karnali%20Bazar" target="_blank"><?php echo $admin_email; ?></a></h4>
            <h4><i class="fa fa-phone text-primary mr-2"></i> WhatsApp: <a href="https://wa.me/<?php echo $admin_contact; ?>" target="_blank"><?php echo $admin_contact; ?></a></h4>
            <h4><i class="fa fa-map-marker text-primary mr-2"></i> Address: <?php echo $admin_address; ?></h4>
            <p class="text-center">
                <a href="https://www.facebook.com/profile.php?id=100011111111111" target="_blank" class="btn btn-primary mr-2">
                    <i class="fa fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/yourtwitterhandle" target="_blank" class="btn btn-info mr-2">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/yourinstagramhandle/" target="_blank" class="btn btn-success">
                    <i class="fa fa-instagram"></i>
                </a>
            </p>
        </div>
    </div>
</div>
<?php include("includes/footer.php")?>

<?php } ?>
