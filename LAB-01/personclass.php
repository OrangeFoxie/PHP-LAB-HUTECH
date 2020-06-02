<?php

    class Person{
        private $name;
        private $nationalID;

        public function __contruct($personName, $ID){
            $this->name = strtolower($personName);
            $this->nationalID = $ID;
        }
        public function GetName(){
            return $this->name;
        }
        public function SetName($newName){
            $this->name = strtoupper($newName);
        }
        public function GetNationalID)(){
            return $this->nationalID;
        }
    }

?>