<?php

    require_once("personclass.php");

    class Employee extends Person{
        private $employeeID;
        private $department;
        public function __construct($employeeName, $nationalID, $dept){
            parent::__construct($employeeName, $nationalID);
            $this->department = $dept;
            $this->employeeID = $this->GenerateEmployeeID();
        }
        
    }

?>