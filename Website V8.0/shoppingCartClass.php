<?php 
require_once 'init.php';
require_once 'ProductClass.php';
require_once 'shoppingCartClass.php';

    class shoppingCartClass {
        public $items = [];
        private $totalCost;

        public function __construct() {
            if (isset($_SESSION['cart_items'])) {
                $this->items = $_SESSION['cart_items'];
            }
        }

        public function addItem($item) {
            $this->items[] = $item;
            $_SESSION['cart_items'] = $this->items;
            var_dump($this->items);
        }


        public function listItems() {
            $names = [];
            foreach ($this->items as $item) {
                $names[] = $item->getName();
            }

            return $names;
        }

        public function buyCart() {
            foreach ($this->items as $x)
                $x->buyProduct(1);
            $this->items = [];
            $cart_items = [];
        }

    }
?>