<?php 

$con = mysqli_connect("localhost", "root", "", "myshop");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to utf8mb4
mysqli_set_charset($con, 'utf8mb4');

?>
