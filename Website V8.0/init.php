<?php   
    session_start();

    // If cart isn't resetting between restarting the website
    // Uncomment following > refresh page > comment the line again > refresh again
    //session_reset();
    require_once 'shoppingCartClass.php';
    if (!isset($_SESSION['cart'])) {
        $cart = new shoppingCartClass();
        $_SESSION['cart'] = serialize($cart);
    }
    else {
        $cart = unserialize($_SESSION['cart']);
    }

    if (!isset($_SESSION['cart_items'])) {
        $cart_items = [];
        $_SESSION['cart_items'] = $cart_items;
    } else {
        $cart_items = $_SESSION['cart_items'];
    }
    

?>