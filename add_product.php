<?php 
require_once("./Entities/product.class.php");
require_once("./Entities/category.class.php");

if (isset($_POST["btnsubmit"])) {
    //Lấy giá trị từ form collection
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtCateID"];
    $price = $_POST["txtPrice"];
    $quantity = $_POST["txtQuantity"];
    $description = $_POST["txtDescription"];
    $picture = $_FILES["txtPicture"];

    //Khởi tạo đối tượng product
    $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);

    //lưu csdl
    $result = $newProduct->save();
    if (!$result) {
        # code...
        header("Location: add_product.php?failure");
    } else {
        header("Location: add_product.php?inserted");
    }
}
?>
<?php include_once("header.php") ?>

<?php 
if (isset($_GET["inserted"])) {
    # code...
    echo "<h2> Thêm sản phẩm thành công </h2>";
}
?>
<div class="container">
<!--form san pham-->
<form method="post" class="text-center" enctype="multipart/form-data">
    <!--ten sp-->
    
    <div class="form-group row">
        <div class="lbltitle col-sm-3">
            <label class"control-label"> Tên sản phẩm </label>
        </div>
        <div class="lblinput col-sm-6" >
            <input type="text" class="form-control" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>">
        </div>
        <div class="col-sm-3"></div>
    </div>
    <!--mo ta sp-->
    <div class="form-group row">
        <div class="lbltitle col-sm-3">
            <label class"control-label"> Mô tả sản phẩm </label>
        </div>
        <div class="lblinput col-sm-6">
            <input type="text" class="form-control" cols="21" rows="10" name="txtDescription" value="<?php echo isset($_POST["txtDescription"]) ? $_POST["txtDescription"] : ""; ?>">
        </div>
                <div class="col-sm-3"></div>
    </div>
    <!--so luong sp-->
    <div class="form-group row">
        <div class="lbltitle col-sm-3">
            <label class"control-label"> số lượng sản phẩm </label>
        </div>
        <div class="lblinput col-sm-6">
            <input type="text" class="form-control" name="txtQuantity" value="<?php echo isset($_POST["txtQuantity"]) ? $_POST["txtQuantity"] : ""; ?>">
        </div>
                <div class="col-sm-3"></div>

    </div>
    <!--gia sp-->
    <div class="form-group row">
        <div class="lbltitle col-sm-3">
            <label class"control-label"> Giá sản phẩm </label>
        </div>
        <div class="lblinput col-sm-6">
            <input type="text" class="form-control" name="txtPrice" value="<?php echo isset($_POST["txtPrice"]) ? $_POST["txtPrice"] : ""; ?>">
        </div>
                <div class="col-sm-3"></div>

    </div>
    <!--loai sp-->
    <div class="form-group row">
        <div class="lbltitle col-sm-3">
            <label> Loại sản phẩm </label>
        </div>
        <div class="lblinput col-sm-4">
            <select name="txtCateID"  class="form-control">
                <option value="" selected >----Chọn Loại-----</option>
                    <?php
                    $cates = Category::list_category();
                    foreach($cates as $item)
                    {
                        echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
                    }
                    ?>
            </select>
        </div>
                <div class="col-sm-4"></div>

    </div>
    <!--hinh anh sp-->
    <div class="form-group row">
        <div class="lbltitle col-sm-3">
            <label> Hình ảnh sản phẩm </label>
        </div>
        <div class="lblinput col-sm-6">
            <input type="file" name="txtPicture" id="txtPicture" accept=".PNG,.GIF,.JPG">
        </div>
                <div class="col-sm-3"></div>

    </div>
    <!--submit-->
    <div class="row">
        <div class="submit">
            <input class="btn btn-primary" type="submit" name="btnsubmit" value="Thêm sản phẩm">
        </div>
    </div>
</form>
</div>
<?php include_once("footer.php") ?> 