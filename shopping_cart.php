<?php include_once('header.php');?>
<?php
    require_once("../LAB3/entites/product.class.php");
    require_once("../LAB3/entites/category.class.php");
    $cates = Category::list_category();

    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors','1');
    if(isset($_GET["id"])){
        $pro_id = $_GET["id"];
        $was_found = false;
        $i = 0;
        if(!isset($_SESSION["cart_item"]) || count($_SESSION["cart_item"])<1){
            $_SESSION["cart_items"] = array(0 => array("pro_id" => $pro_id, "quantity" => 1));
        }else{
            foreach($_SESSION["cart_item"] as $item){
                $i++;
                while(list($key,$value) = each($item)){
                    if($key=="pro_id" && $value==$pro_id){
                        array_splice($_SESSION["cart_items"], $i-1,1, array(array("pro_id" => $pro_id, "quantity" => $item["quantity"]+1)));
                        $was_found = true;
                    }
                }
            }
            if($was_found==false){
                array_push($_SESSION["cart_items"], array("pro_id" => $pro_id, "quantity" => 1));
            }
        }
        header("location: shopping_cart.php");
    }
?>

<!--Thông tin Shoping cart -->
<div class="contrainer text-center">
    <div class="col-sm-3">
        <h3>Danh mục</h3>
        <ul class="list-group">
            <?php
                foreach($cates as $item){
                    echo <li class="list-group-item"><a href="../LAB3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."></a></li>";
                }
            ?>
        </ul>
    </div>
    <div class="col-sm-9">
        <h3>Thông tin giỏ hàng</h3><br>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>

            <tbody>
                
            </tbody>
        </table>
    </div>
</div>