<?php 
    class ProductParentClass {
        public $name;
        public $price;
        public $recentSales;
        public $imageDirectory;
        public $stock;

        function __construct($name) {
            $this->name = $name;
        }
    }
?>