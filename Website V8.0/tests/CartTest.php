<?php
require_once __DIR__ . '/../shoppingCartClass.php';
require_once __DIR__ . '/../productClass.php';

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase {
    public function testAddItemsToArray() {
        $cart = new shoppingCartClass();

        $product1 = new ProductClass("Temp");
        $cart->addItem($product1);

        $product2 = new ProductClass("Temp");
        $cart->addItem($product2);

        $this->assertEquals(array($product1, $product2), array($cart->items[0], $cart->items[0]), 'Not adding item\'s to array');
    }

    public function testListItems()  {
        $cart = new shoppingCartClass();
        $cart->items = [];

        $product1 = new ProductClass("Temp 1");
        $cart->addItem($product1);

        $product2 = new ProductClass("Temp 2");
        $cart->addItem($product2);


        $this->assertEquals(array("Temp 1", "Temp 2"), $cart->listItems(), 'Not correctly listing items');
    }

    public function testPurchaseReducesStock() {
        $cart = new shoppingCartClass();

        $product = new ProductClass("Temp 1");
        $product->stock = 6;
        $cart->addItem($product);

        $cart->buyCart();

        $this->assertEquals(5, $product->stock, 'Stock not being reduced when item is purchased');
    }
}
