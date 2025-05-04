<?php 
    require_once 'include/ProductHeader.php';
    require_once 'include/NavBar.php';
?>

<body>
  <div class="container">
    <img src="img/DP21QD.jpeg" height="400" width="900" alt="DP21">
    <h1>DP 2.1 QD-OLED Monitor</h1>
    <div class="price">€940,00</div>  
    <hr>
    <br>
    <p>MSI leads to the forefront of gaming technology, delivering an unprecedented immersive gaming experience for gamers.
    Renowned QD-OLED, combined with the latest OLED panel technology, ensures that these displays exhibit the best picture quality and
    incredible high contrast when gaming. Equipped with fastest 0.03ms GtG response time and 360Hz refresh rate, which showcases
    exceptional picture quality through each pixel lighting control, resulting in true black scenes.</p>  
    <form method="post">
      <button type="submit" name="add_item" class="buy-button">Add to Cart</button>
    </form>
    <?php
      if (isset($_POST['add_item'])) {
        $item = new ProductClass('dp');
        $cart->addItem($item);
        $_SESSION['cart'] = serialize($cart);
      }
    ?>
  </div>

</body>
</html>
