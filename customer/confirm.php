<?php 
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
}
include("includes/header.php");

$session_email = $_SESSION['customer_email'];

$select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";
$run_customer = mysqli_query($con, $select_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];

$get_product_id = "SELECT product_id FROM pending_orders WHERE order_id='$order_id'";
$run_product_id = mysqli_query($con, $get_product_id);
$row_product_id = mysqli_fetch_array($run_product_id);
$product_id = $row_product_id['product_id'];

?>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>My Account</li>
            </ul>
        </div>

        <div class="col-md-3">
            <?php 
            include("includes/sidebar.php");
            ?>
        </div>

        <div class="col-md-9">
            <div class="box">
                <h1 align="center"> Pay with eSewa </h1>
                <h3 align="center"><span style="color:red;">Including soon</span> Now choose cash on delivery</h3>
                <p class="lead text-center">
                    <a href="../order.php?c_id=<?php echo $customer_id ?>">Cash on Delivery </a>
                </p>
                <center>
                    <img class="img-responsive" src="../images/e-sewa.png" alt="img-paypall" style="width:90px;">
                    <br><br>

                    <?php
                    // Configuration
                    $merchant_code = "EPAYTEST"; // Replace with your eSewa product/merchant code
                    $secret_key = "8gBm/:&EnhH.1/q"; // Replace with your secret key
                    $success_url = "https://localhost/esewa/success.php"; // Your success URL
                    $failure_url = "https://localhost/esewa/failure.php"; // Your failure URL

                    // Transaction Data
                    $amount = 100; // Product price
                    $tax_amount = 10; // Tax
                    $service_charge = 0; // Service charge
                    $delivery_charge = 0; // Delivery charge
                    $total_amount = $amount + $tax_amount + $service_charge + $delivery_charge;
                    $transaction_uuid = uniqid("txn_", true); // Unique transaction ID

                    // Fields for signature
                    $signed_field_names = "total_amount,transaction_uuid,product_code";
                    $signature_data = "$total_amount|$transaction_uuid|$merchant_code";
                    $signature = base64_encode(hash_hmac('sha256', $signature_data, $secret_key, true));
                    ?>

                    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                        <input type="hidden" name="amount" value="<?= $amount ?>" required>
                        <input type="hidden" name="tax_amount" value="<?= $tax_amount ?>" required>
                        <input type="hidden" name="total_amount" value="<?= $total_amount ?>" required>
                        <input type="hidden" name="transaction_uuid" value="<?= $transaction_uuid ?>" required>
                        <input type="hidden" name="product_code" value="<?= $merchant_code ?>" required>
                        <input type="hidden" name="product_service_charge" value="<?= $service_charge ?>" required>
                        <input type="hidden" name="product_delivery_charge" value="<?= $delivery_charge ?>" required>
                        <input type="hidden" name="success_url" value="<?= $success_url ?>" required>
                        <input type="hidden" name="failure_url" value="<?= $failure_url ?>" required>
                        <input type="hidden" name="signed_field_names" value="<?= $signed_field_names ?>" required>
                        <input type="hidden" name="signature" value="<?= $signature ?>" required>
                        <input type="submit" value="Pay with eSewa">
                    </form>

                </center>
            </div>
        </div><!-- col-md-9 Finish -->
    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php 
include("includes/footer.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap-v533.min.js"></script>

</body>
</html>