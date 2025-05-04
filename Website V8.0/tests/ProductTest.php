<?php
require_once __DIR__ . '/../productClass.php';

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase {
    public function testProductConstructor() {
        $product = new productClass('TestName');
        $this->assertEquals('TestName', $product->getName(), 'Constructor not setting name correctly');
    }

    public function testStockReduced()  {
        $product = new productClass('Test');
        $product->stock = 5;
        $product->buyProduct(1);
        $this->assertEquals(4, $product->stock, 'Stock not reduced by 1');
    }

    public function testQtyStayAboveZero() {
        $product = new productClass('Test');
        $product->stock = 5;
        $product->buyProduct(10);
        $this->assertEquals(5, $product->stock, 'Stock not limitted to 0 minimum');
    }
}
