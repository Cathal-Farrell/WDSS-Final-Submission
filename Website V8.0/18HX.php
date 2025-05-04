<?php 
    require_once 'include/ProductHeader.php';
    require_once 'include/NavBar.php';
?>

<body>
    <div class="container">
    <img src="img/Titan18HX.jpeg" height="400" width="900" alt="18HX">
    <h1>Titan 18HX Laptop</h1>  
    <div class="price">€5,999.00</div>
    <hr>
    <br>
    <p>MSI's Titan 18 HX Dragon Edition Norse Myth redefines the standard for gaming laptops. Powered by the latest 
    Intel® Core™ Ultra 9 processor 285HX and up to NVIDIA® GeForce RTX™ 5090 Laptop GPU.</p>  

    <p>This limited-edition beast delivers unparalleled performance with a stunning Norse mythology-inspired design. 
    Featuring intricate engravings and a dragon spirit plaque, it's more than just a high-performance laptop—it's a 
    true collectible masterpiece. Built for those who demand legendary power and resilience, this Titan is ready to 
    conquer any challenge as your ultimate gaming powerhouse.</p>
    <form method="post">
      <button type="submit" name="add_item" class="buy-button">Add to Cart</button>
    </form>
    <?php
      if (isset($_POST['add_item'])) {
        $item = new ProductClass('18hx');
        $cart->addItem($item);
        $_SESSION['cart'] = serialize($cart);
      }
    ?>
  </div>

</body>
</html>
