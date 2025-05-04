<?php
require_once __DIR__ . '/../shoppingCartClass.php';
require_once __DIR__ . '/../productClass.php';

use PHPUnit\Framework\TestCase;

class ProductPageTest extends TestCase {
    public function testProductConstructor() {
        $cart = new shoppingCartClass();
        $cart->items = [];
        $_POST['add_item'] = 'submit';
        if (isset($_POST['add_item'])) {
            $item = new ProductClass('Claw 8');
            $cart->addItem($item);
        }
        $this->assertEquals(array('Claw 8'), $cart->listItems(), 'Button not adding item to list');
    }
}
