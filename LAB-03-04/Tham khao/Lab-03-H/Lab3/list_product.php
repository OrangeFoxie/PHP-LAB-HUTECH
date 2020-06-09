<?php include_once("header.php") ?>
<div class="row">
    <?php
    include_once("/entities/product.class.php");
    $products = Product::list_product();
    foreach ($products as $product) {
        echo '<div class="col-12 col-md-4"><div class="card">';
        echo '<img src="' . $product["Picture"] . '" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$product["ProductName"].'</h5>';
        echo '<p class="card-text"> Giá: '.$product["Price"].' VNĐ</p>';
        echo '<p class="card-text"> Số lượng: '.$product["Quantity"].'</p>';
        echo '<p class="card-text">'.$product["Description"].'</p>';
        echo '<a href="#" class="btn btn-primary">Buy</a>';
        echo '</div></div></div>';
    }
    ?>
</div>
<?php include_once("footer.php") ?>