<?php
  require_once("../LAB3/entities/product.class.php");
  require_once("../LAB3/entities/category.class.php");
?>

<?php
    include_once("header.php");
    if(!isset($_GET["cateid"])){
        $prods = Product::list_product();
    }else{
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateid($cateid);
    }$cates = Category::list_category();
      //$prods = Product::list_product();
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../LAB3/index.php">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
    </ol>
</nav>
<div class="container text-center">

    <section class="container text-center">
        <div class="col-sm-12 panel panel-danger">
            <h3 class="panel-heading">Danh mục</h1><br>
            <ul class = "list-group">
                <?php
                    foreach($cates as $item){
                        echo "<li class='list-group-item'><a href=LAB3/list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
                    }
                ?>
            </ul>
        </div>
    </section>

    <div class="col-sm-12 panel panel-info">
        <h3 class="panel-heading">Chi tiết sản phẩm</h3>
        <div class="row">
            <?php
            foreach ($prods as $item) {
            ?>
                <div class="card" style="width: 19rem;">
                    <img src="<?php echo "../LAB3/" . $item["Picture"]; ?>" class="card-img-top" style="height: 200px; width: 100%; align-content: center; text-align:center;"  alt="Image error">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item["ProductName"]; ?></h5>
                        <p class="card-text">Mô tả: <?php echo $item["Description"]; ?></p>
                        <p class="card-text"><?php echo $item["Price"]; ?></p>                        
                        <button type="button" class="btn btn-primary" onclick="location.href='../LAB3/shopping_cart.php?id=<?php echo $item["ProductID"]; ?>'">Mua hàng</button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="col-sm-12 panel panel-info">
        <h3 class="panel-heading">Sản phẩm liên quan</h3>
        <div class="row">
            <?php
            foreach ($prods as $item) {
            ?>
                <div class="card" style="width: 12rem;">
                    <img src="<?php echo "../LAB3/" . $item["Picture"]; ?>" class="card-img-top" style="height: 200px; width: 100%; align-content: center; text-align:center;"  alt="Image error">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item["ProductName"]; ?></h5>
                        <p class="card-text"><?php echo $item["Price"]; ?></p>
                        <button type="button" class="btn btn-primary" onclick="location.href='../LAB3/shopping_cart.php?id=<?php echo $item["ProductID"]; ?>'">Mua hàng</button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php include_once("footer.php"); ?>