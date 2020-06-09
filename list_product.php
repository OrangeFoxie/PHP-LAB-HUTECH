<?php
require_once("/entities/product.class.php");
require_once("/entities/category.class.php");
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
        <li class="breadcrumb-item"><a href="http://localhost:1000/LAB-03/">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
    </ol>
</nav>
<div class="container text-center">

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Sản phẩm cửa hàng</h1>
        </div>
    </section>

    
    <div class="row">
        <?php
        foreach ($prods as $item) {
        ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo "/LAB-03/" . $item["Picture"]; ?>" class="card-img-top" style="height: 200px; align-content: center; text-align:center;"  alt="Image error">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item["ProductName"]; ?></h5>
                    <p class="card-text"><?php echo $item["Price"]; ?></p>
                    <a href="#" class="btn btn-primary">Mua hàng</a>

                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php include_once("footer.php"); ?>