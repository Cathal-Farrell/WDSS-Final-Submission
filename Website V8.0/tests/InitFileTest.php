<?php
session_start();
use PHPUnit\Framework\TestCase;

class InitFileTest extends TestCase {
    public function testProductConstructor() {
        if (!isset($_SESSION['cart'])) {
            $cart = new shoppingCartClass();
            $_SESSION['cart'] = serialize($cart);
        }
        $this->assertEquals(true, isset($_SESSION['cart']), 'Init file not creating cart');
    }
}