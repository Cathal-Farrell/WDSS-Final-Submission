<?php 
    require_once 'include/ProductHeader.php';
    require_once 'include/NavBar.php';
?>

<body>
    <div class="container">
        <img src="img/ClutchGM51.jpeg" height="400" width="900" alt="GM51">
        <h1>Clutch GM51 Lightweight Mouse</h1> 
        <div class="price">€126,00</div>
        <hr>
        <p>Witness a new gaming era with THE APEX Wireless mouse built to win - MSI CLUTCH GM51 LIGHTWEIGHT WIRELESS.
        It features an ergonomic shape with patented MSI Diamond LightGrips as well as a top-notch optical sensor with 
        cutting-edge technology that maximizes performance and precision of every micro-movement.</p>  
    
        <p>The CLUTCH GM51 LIGHTWEIGHT WIRELESS supports two advanced charging solutions. MSI Snap Charging (wired) 
        offers 3x faster charging for when you’re in a hurry to get back in the game. The included MSI Charging Dock 
        offers a convenient standard charging solution while also doubling as a display for the mouse.</p>
        <form method="post">
            <button type="submit" name="add_item" class="buy-button">Add to Cart</button>
        </form>
        <?php
        if (isset($_POST['add_item'])) {
            $item = new ProductClass('gm51');
            $cart->addItem($item);
            $_SESSION['cart'] = serialize($cart);
        }
        ?>
    </div>
</body>
</html>
