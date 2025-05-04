<?php 
    require_once 'include/ProductHeader.php';
    require_once 'include/NavBar.php';
?>

<body>
  <div class="container">
    <img src="img/VigorGK71.jpeg" height="400" width="900" alt="GK71">
    <h1>GK 71 Keyboard</h1>
    <div class="price">€212,00</div>
    <hr>
    <br>
    <p>The VIGOR GK71 SONIC - Blue Switches gaming keyboard offers the ultimate clicky switch feel while being packed in a 
    lightweight design. Featuring one of the world's lightest clicky mechanical switches our very own MSI Sonic Blue,
    dominate the competition with quick reactions and light key presses.</p>  

    <p>LIGHT & CLICKY MSI SONIC BLUE
    Featuring a 45g actuation force and a smooth clicky feel, MSI Sonic Blue Switches are designed to provide seamless and 
    instantaneous responses by minimizing finger fatigue and enhancing comfort through ergonomics during long gaming sessions.</p>
    <form method="post">
      <button type="submit" name="add_item" class="buy-button">Add to Cart</button>
    </form>
    <?php
      if (isset($_POST['add_item'])) {
        $item = new ProductClass('gk71');
        $cart->addItem($item);
        $_SESSION['cart'] = serialize($cart);
      }
    ?>
  </div>
  

</body>
</html>
