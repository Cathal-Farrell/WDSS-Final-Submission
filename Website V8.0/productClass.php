<?php 

    include "ProductParentClass.php";
    
    class ProductClass extends ProductParentClass {
        
        function buyProduct($qty) {
            if ($qty <= $this->stock) {
                $this->stock -= $qty;
            };
        }

        function getName() {
            return $this->name;
        }

    }
?>