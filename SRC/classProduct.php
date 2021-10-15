<?php

    class User {

        public $idProduct;
        public $name;
        public $idAuthor;
        public $price;
        public $routProduct;


        function __construct($idProduct, $name , $idAuthor, $price, $routProduct) {
            $this->idProduct = $idProduct;
            $this->name = $name;
            $this->idAuthor = $idAuthor;
            $this->price = $price;
            $this->routProduct = $routProduct;
        }
    }
?>