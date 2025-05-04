<?php 
    require_once 'include/ProductHeader.php';
    require_once 'include/NavBar.php';
?>

<body>
    <div class="container">
        <img src="img/Claw8.jpeg" alt="Claw 8">
        <h1>Claw 8 Console</h1>
        <div class="price">€1,099</div>
        <hr>
        <p>Experience the ultimate grip and control with the Claw 8 AI+ A2VM.</p>  
        <p>Equipped with the cutting-edge Intel® Core™ Ultra 7 processor (Series 2) and enhanced by Intel® XeSS technology, this device ensures unmatched performance and efficiency.</p>
        <p>Featuring an immersive 8-inch display and a powerful 80Whr battery, the Claw 8 AI+ is built for all-day productivity and entertainment.</p>
        <form method="post">
            <button type="submit" name="add_item" class="buy-button">Add to Cart</button>
        </form>
        <?php
            if (isset($_POST['add_item'])) {
                $item = new ProductClass('Claw 8');
                $cart->addItem($item);
                $_SESSION['cart'] = serialize($cart);
            }
        ?>
    </div>
</body>
</html>
