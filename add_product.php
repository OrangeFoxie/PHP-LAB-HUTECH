<?php

require_once("../LAB3/entities/product.class.php");
require_once("../LAB3/entities/category.class.php");

if (isset($_POST["btnsubmit"])) {
    // lấy giá trị từ form collection
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtCateID"];
    $price = $_POST["txtPrice"];
    $quantity = $_POST["txtQuantity"];
    $description = $_POST["txtDesc"];
    $picture = $_FILES["txtPic"];
    // khởi tạo đối tượng product
    $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);
    // lưu xuống CSDL
    $result = $newProduct->save();
    if (!$result) {
        // truy vấn lỗi
        header("Location: add_product.php?failure");
    } else {
        header("Location: add_product.php?inserted");
    }
}
?>
<?php include_once("header.php") ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../LAB3/index.php">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
    </ol>
</nav>

<div class="container">
    <?php
    if (isset($_GET["inserted"])) {
        echo "<h2>Thêm sản phẩm thành công</h2>";
    }
    ?>
    <!-- form sản phẩm -->
    <form method="post" enctype="multipart/form-data">

        <!-- tên sản phẩm -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Tên sản phẩm</label>
            <div class="col-8">
                <input class="form-control" type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>" />
            </div>
        </div>

        <!-- mô tả sản phẩm -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Mô tả sản phẩm</label>

            <div class="col-8">
                <textarea name="txtDesc" cols="101" rows="10" value="<?php echo isset($_POST["txtDesc"]) ? $_POST["txtDesc"] : ""; ?>"></textarea>
            </div>
        </div>

        <!-- số lượng sản phẩm -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Số lượng sản phẩm</label>

            <div class="col-8">
                <input class="form-control" type="text" name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtQuantity"] : ""; ?>" />
            </div>
        </div>

        <!-- giá sản phẩm -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Giá sản phẩm</label>

            <div class="col-8">
                <input class="form-control" type="text" name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : ""; ?>" />
            </div>
        </div>

        <!-- loại sản phẩm -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Loại sản phẩm</label>
            <div class="col-8">
                <select name="txtCateID" class="form-control">
                    <option selected>Chọn danh mục</option>
                    <?php
                    $cates = Category::list_category();
                    foreach ($cates as $item) {
                        echo "<option value=" . $item["CateID"] . ">" . $item["CategoryName"] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- hình ảnh sản phẩm -->
        <div class="form-group row">
            <label class="col-4 col-form-label">Hình ảnh sản phẩm</label>

            <div class="col-8">
                <input class="form-control" type="file" name="txtPic" accept=".PNG,.GIF,.JPG">
            </div>
        </div>

        <!-- submit button -->
        <input class="btn btn-primary" type="submit" name="btnsubmit" value="Thêm sản phẩm" />

    </form>
</div>

<?php include_once("footer.php"); ?>
