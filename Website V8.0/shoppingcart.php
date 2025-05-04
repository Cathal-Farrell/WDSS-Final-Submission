<?php 
    require_once 'init.php';
    require_once 'ProductClass.php';
    require_once 'shoppingCartClass.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/productDc.css">
</head>
<body>
    <div class="header">
        <a href="index.php" class="logo">NVC Tech</a>
        <div class="header-middle">
            <a href="searchpage-version1.php">Search</a>    
            <a href="aboutus-version1.php">About Us</a>
            <a href="shoppingcart.php">Cart (<span id="cart-count">0</span>)</a>
            <div class="header-login">
                <a href="login.php">Login/Sign-Up</a>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Shopping Cart</h1>
        <div id="cart-items">
            <?php
                if ($cart->items) {
                    foreach ($cart->listItems() as $x) {
                        echo $x . " ";
                    }
                }
            ?>
        </div>
        <button onclick="">Clear Cart</button>
        <a href="checkoutform.php">Check-Out</a>
    </div>
    
</body>
</html>
