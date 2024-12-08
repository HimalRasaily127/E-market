<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Assuming the response is sent as a query parameter named 'response'
    if (isset($_GET['response'])) {
        $response_body = base64_decode($_GET['response']); // Decode the response from Base64
        $response = json_decode($response_body, true);

        // Your secret key
        $secret_key = "8gBm/:&EnhH.1/q"; // Replace with your actual secret key

        // Prepare to generate the expected signature
        $signature_data = $response['total_amount'] . 
                          $response['transaction_uuid'] . 
                          $response['product_code'];

        // Generate the expected signature
        $expected_signature = base64_encode(hash_hmac(
            'sha256',
            $signature_data,
            $secret_key,
            true
        ));

        // Check if the received signature matches the expected signature
        if ($response['signature'] === $expected_signature && $response['status'] === "COMPLETE") {
            // Payment verified
            // Here you can update your database and notify the user
            echo "Payment Successful. Transaction ID: " . htmlspecialchars($response['transaction_uuid']);
        } else {
            // Signature mismatch or payment failure
            echo "Payment verification failed!";
        }
    } else {
        echo "No response received.";
    }
} else {
    echo "Invalid request method.";
}
?>