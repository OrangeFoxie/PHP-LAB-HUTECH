<?php
require_once("/entities/product.class.php");

if (isset($_POST["btnSubmit"])) {
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtCateID"];
    $price = $_POST["txtPrice"];
    $quantity = $_POST["txtQuantity"];
    $description = $_POST["txtDescription"];
    $picture = $_POST["txtPicture"];

    $newProduct =  new Product($productName, $cateID,  $price, $quantity, $description, $picture);
    $result = $newProduct->save();
    if (!$result) {
        header("Location: add_product.php?failure");
    } else {
        header("Location: add_product.php?inserted");
    }
}
?>

<?php include_once("header.php") ?>


<div class="col-md-8 mx-auto">
    <?php
    if (isset($_GET["inserted"])) {
        echo "<h2>Thêm sản phẩm thành công</h2>";
    }
    ?>
    <form method="post" action="add_product.php">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="txtName" class="form-control" required max="150" value="<?php echo isset($_POST['txtName']) ? $_POST['txtName'] : "" ?>" />
        </div>
        <div class="form-group">
            <label>Catogory ID</label>

            <select name="txtCateID" class="form-control">
                <?php $db = new Db();

                $categories = $db->select_to_array("SELECT * FROM CATEGORY");
                foreach($categories as $category)
                {
                    echo "<option value=\"".$category["CateID"]."\">".$category["CategoryName"]."</option>";
                }
                ?>
                <select>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="txtPrice" class="form-control" step="0.1" required min="0" value="<?php echo isset($_POST['txtPrice']) ? $_POST['txtPrice'] : "" ?>" />
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="txtQuantity" class="form-control" step="1" required min="0" value="<?php echo isset($_POST['txtQuantity']) ? $_POST['txtQuantity'] : "" ?>" />
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="txtDescription" class="form-control" max="500" value="<?php echo isset($_POST['txtDescription']) ? $_POST['txtDescription'] : "" ?>"></textarea>
        </div>
        <div class="form-group">
        
        <divclass="row">
            <div class="lbltitle">
                <label>Đường link ảnh</label>
            </div>
            <div class="lblinput">
                <input type="file" id ="txtpic" name="txtpic" accept=".PNG,.GIF,.JPG">
                </div>
            </div>
            <label>Picture</label>
            <input type="text" name="txtPicture" class="form-control" max="200" value="<?php echo isset($_POST['txtPicture']) ? $_POST['txtPicture'] : "" ?>" />
        </div>

        




        <div class="form-group">
            <input class="btn btn-block btn-success" type="submit" name="btnSubmit" value="Submit" />
        </div>
    </form>
</div>
<?php include_once("footer.php") ?>