<?php
// Start a session to retain user information if needed
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Payment Failed</h1>
        <p>We're sorry, but your payment could not be processed. Please try again.</p>
        
        <?php if (isset($_GET['error'])): ?>
            <p>Error Details: <?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <p>
            <a href="confirm.php">Retry Payment</a> | 
            <a href="contact.php">Contact Support</a>
        </p>
    </div>
</body>
</html>