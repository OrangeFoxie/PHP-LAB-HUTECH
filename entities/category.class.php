<?php
require_once("../LAB3/config/db.class.php");
/**
 *
 */
class Category
{
    public $cateID;
    public $categoryName;
    public $description;

    public function __construct($cate_name, $desc)
    {
        $this->categoryName = $cate_name;
        $this->description = $desc;
    }
    // lấy danh sách chuyên mục loại sản phẩm
    public static function list_category()
    {
        $db = new DB();
        $sql = "SELECT * FROM category";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
