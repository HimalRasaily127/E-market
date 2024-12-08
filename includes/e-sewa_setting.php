<?php
// Start session
// session_start();

// Configuration
$esewa_merchant_code = "EPAYTEST"; // Replace with your actual merchant code
$success_url = "https://localhost/shop/esewa_success.php"; // Update to your success page
$failure_url = "https://localhost/shop/esewa_failure.php"; // Update to your failure page
$secret_key = "8gBm/:&EnhH.1/q"; // Replace with the secret key provided by eSewa
// Transaction details
$amount = 100; // Example amount
$tax_amount = 10; // Example tax
$total_amount = $amount + $tax_amount;
$transaction_uuid = uniqid("txn_", true); // Generate unique transaction ID
$product_code = $esewa_merchant_code;

// Generate signature
$signed_field_names = "total_amount,transaction_uuid,product_code";
$signature_data = "$total_amount|$transaction_uuid|$product_code|$secret_key";
$signature = hash_hmac('sha256', $signature_data, $secret_key);
// HTML Form
?>