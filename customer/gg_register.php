<?php
// Check if Google OAuth response code is available
if (isset($_GET['code'])) {
    // Google OAuth 2.0 response code
    $code = $_GET['code'];

    // Set your Google client ID and secret here
    $client_id = '869224076856-tv9ebdp83vu6jsjs4st21ifd80qjd2db.apps.googleusercontent.com'; // Replace with your Google Client ID
    $client_secret = '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'; // Replace with your Google Client Secret
    $redirect_uri = 'http://localhost/shop/customer/gg_register.php'; // Same as in your Google OAuth request

    // Prepare POST data for token request
    $token_data = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    ];

    // Send a POST request to the token endpoint
    $ch = curl_init('https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code != 200) {
        // Error: Failed to retrieve the access token
        echo '<script>alert("Failed to retrieve access token. Error: ' . $http_code . '")</script>';
        echo '<script>window.open("../customer_register.php", "_self")</script>';
    } else {
        // Decode the token response
        $token_info = json_decode($response, true);

        if (isset($token_info['access_token'])) {
            // Successfully retrieved access token
            $access_token = $token_info['access_token'];

            // Use the access token to fetch user information from Google
            $user_info_url = 'https://www.googleapis.com/oauth2/v2/userinfo?access_token=' . $access_token;
            $user_info = file_get_contents($user_info_url);
            $user_data = json_decode($user_info, true);

            // Extract user details
            $email = isset($user_data['email']) ? $user_data['email'] : '';
            $name = isset($user_data['name']) ? $user_data['name'] : '';
            $profile_image = isset($user_data['picture']) ? $user_data['picture'] : '';
    
            
            $address = ''; // Google API does not provide address, set default empty
            // Call the registerUser function to insert or log in the user
            registerUser($email, $name, $profile_image);

        } else {
            // Error: Failed to retrieve the access token
            echo '<script>alert("Failed to retrieve access token. Please try again later.")</script>';
            echo '<script>window.open("../customer_register.php", "_self")</script>';
        }
    }
} else {
    // Error: Missing authorization code in URL
    echo '<script>alert("Missing authorization code in URL. Please try again later.")</script>';
    echo '<script>window.open("../customer_register.php", "_self")</script>';
}

// Function to register the user in the database
function registerUser($email, $name, $profile_image) {
    // Connect to your database
    $conn = new mysqli('localhost', 'root', '', 'myshop'); // Replace with your DB credentials

    // Check for a connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the customer already exists by email
    $sql = "SELECT * FROM customers WHERE customer_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Customer already exists, log them in (start session)
        echo '<script>alert("You are already Registered with us|| login now !")</script>';
        echo '<script>window.open("../checkout.php", "_self")</script>';
    } else {
        // Insert new customer record in the database
        $customer_name = $name;
        $customer_email = $email;
        $customer_pass = ''; // No password needed, Google login
        $customer_contact = ''; // Optional field, can be added later
        $customer_province = ''; // Optional field, can be added later
        $customer_district = ''; // Optional field, can be added later
        $customer_Rural_municipality = ''; // Optional field
        $customer_word_no = ''; // Optional field
        $customer_image = $profile_image;
        $customer_ip = $_SERVER['REMOTE_ADDR']; // User's IP address

        // SQL Insert statement
        $insert_sql = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_contact, customer_province, customer_district, customer_Rural_municipality, customer_word_no, customer_image, customer_ip)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param('ssssssssss', $customer_name, $customer_email, $customer_pass, $customer_contact, $customer_province, $customer_district, $customer_Rural_municipality, $customer_word_no, $customer_image, $customer_ip);

        // Execute the insert query and check for errors
        if ($insert_stmt->execute()) {
            echo '<script>alert("Registration successful! You are now logged in.")</script>';
            // Save the customer's email in a session
            $_SESSION['customer_email'] = $customer_email;
            // Redirect to login or home page
            header('Location: http://localhost/shop/customer/my_account.php');
        } else {
            echo '<script>alert("Error: ' . $insert_stmt->error . '")</script>';
    }
    // Close the database connection
    $conn->close();
    }
}
?>

