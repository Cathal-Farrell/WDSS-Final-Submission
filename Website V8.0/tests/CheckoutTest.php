<?php
session_start();

require_once __DIR__ . '/../shoppingCartClass.php';
require_once __DIR__ . '/../productClass.php';

use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase {
    public function testCartEmptied() {
        $cart = new shoppingCartClass();
        $cart->items = [];

        $product1 = new ProductClass("Product 1");
        $product2 = new ProductClass("Product 2");
        
        $cart->addItem($product1);
        $cart->addItem($product2);

        $cart->buyCart();

        $this->assertEquals(array(), $cart->items, 'Cart not being emptied on purchase');
    }

    public function testStockReduced() {
        $cart = new shoppingCartClass();
        $cart->items = [];

        $product1 = new ProductClass("Product 1");
        $product2 = new ProductClass("Product 2");

        $product1->stock = 5;
        $product2->stock = 3;

        $cart->addItem($product1);
        $cart->addItem($product2);

        $cart->buyCart();

        $this->assertEquals(array(4, 2), array($product1->stock, $product2->stock), 'Stock not being reduced on purchase');
    }
}
