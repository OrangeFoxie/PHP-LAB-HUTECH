<?php
require_once('/config/db.class.php');

class Product
{
    public $productID;
    public $productName;
    public $CateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public function __construct($name, $cate_id, $price, $quantity, $description, $picture)
    {
        $this->productName = $name;
        $this->CateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->picture = $picture;
    }

    public function save()
    {
        $db = new Db();
        $sql = "INSERT INTO Product (`ProductName`, `CateID`, `Price`, `Quantity`, `Description`, `Picture`) VALUES
                ('$this->productName','$this->CateID','$this->price','$this->quantity','$this->description','$this->picture')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_product(){
        $db = new Db();
        $sql = "SELECT *  FROM product";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
