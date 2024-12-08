<?php
session_start(); // Initialize the session
include("functions/functions.php");
include("includes/db.php");

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $client_id = '869224076856-tv9ebdp83vu6jsjs4st21ifd80qjd2db.apps.googleusercontent.com';
    $client_secret = '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';
    $redirect_uri = 'http://localhost/shop/customer/gg_login.php';

    $token_data = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'
    ];

    $ch = curl_init('https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($token_data));
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        echo 'Curl error: ' . $error;
    } else {
        $token_info = json_decode($response, true);

        if (isset($token_info['access_token'])) {
            $access_token = $token_info['access_token'];

            $user_info_url = 'https://www.googleapis.com/oauth2/v2/userinfo?access_token=' . $access_token;
            $user_info = file_get_contents($user_info_url);
            if ($user_info === false) {
                echo 'Error fetching user information';
            } else {
                $user_data = json_decode($user_info, true);
                $check_email = "SELECT * FROM customers WHERE customer_email='$user_data[email]'";
                $run_email = mysqli_query($con, $check_email);
                if (mysqli_num_rows($run_email) > 0) {
                    echo 'Logged in as: ' . $user_data['email'];
                    // Create session
                    if (!isset($_SESSION['customer_email'])) {
                        $_SESSION['customer_email'] = $user_data['email'];
                    }

                    $get_ip = getRealIpUser();
                    $select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip'";
                    $run_cart = mysqli_query($con, $select_cart);
                    $check_cart = mysqli_num_rows($run_cart);

                    if ($check_cart == 0) {
                        echo "<script>alert('You are Logged in');</script>";
                        echo "<script>window.open('my_account.php?my_orders', '_self');</script>";
                    } else {
                        echo "<script>alert('You are Logged in');</script>";
                        echo "<script>window.open('../order_address.php', '_self');</script>";
                    }
                } else {
                    echo "This email is not registered, please <a href='customer_register.php'>Register</a>";
                }
            }
        } else {
            echo 'Error retrieving access token';
        }
    }
} else {
    echo 'Authorization code not found.';
}
?>

