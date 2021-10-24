<?php

    class User {

        public $id;
        public $username;
        public $pass;
        public $name;
        public $surnames;
        public $addr;


        function __construct($id, $username, $pass, $name, $surnames, $addr) {
            $this->id = $id;
            $this->username = $username;
            $this->pass = $name;
            $this->surnames = $surnames;
            $this->addr = $addr;
        }
    }
?>