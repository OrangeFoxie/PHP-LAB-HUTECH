<?php
require_once("/entities/product.class.php");
?>

<?php
include_once("header.php");
$prods = Product::list_product();
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/lab_3/index.php">Trang chủ</a></li>
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
                <img src="<?php echo "/lab_3/" . $item["Picture"]; ?>" class="card-img-top" style="width: 100%" alt="Image error">
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