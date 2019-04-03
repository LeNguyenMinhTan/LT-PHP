<?php 
require_once("./Entities/product.class.php");
require_once("./Entities/category.class.php");
?>
<?php 
include_once("header.php");

if (!isset($_GET["id"])) {
    header('Location: not_found.php');
} else {
    $id = $_GET["id"];
    $prod = reset(Product::get_product($id));
    $prods_relate = Product::list_product_relate($prod["CateID"], $id);
}

$cates = Category::list_category();
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h1>Chi tiết sản phẩm</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Category</h2>
                    <ul>
                        <?php
                        $cates = Category::list_category();
                        foreach ($cates as $item) {
                            echo "<li><a
                            href=/LT-PHP/list_product.php?cateid=" .$item["CateID"] . ">" .$item["CategoryName"] . "</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="index.php">Home</a>
                        <a href="">Category Name</a>
                        <a href="./product_detail.php?id=<?php echo $item["ProductID"] ?>"><?php echo $prod["ProductName"]?></a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="<?php echo "" .$prod["Picture"]?>" alt="">
                                </div>

                                <div class="product-gallery">
                                    <img src="img/product-thumb-1.jpg" alt="">
                                    <img src="img/product-thumb-2.jpg" alt="">
                                    <img src="img/product-thumb-3.jpg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo $prod["ProductName"]?></h2>
                                <div class="product-inner-price">
                                    <ins>$<?php echo $prod["Price"] ?></ins> <del>$100.00</del>
                                </div>    

                                <form action="" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Add to cart</button>
                                </form>   

                                <div class="product-inner-category">
                                    <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                </div> 

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Khác</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Mô tả</h2>  
                                            <p><?php echo $prod["Description"] ?></p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Số lượng</h2>
                                            <p><?php echo $prod["Quantity"] ?></p>
                                            <div class="submit-review">
                                                <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                <div class="rating-chooser">
                                                    <p>Your rating</p>

                                                    <div class="rating-wrap-post">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                <p><input type="submit" value="Submit"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Sản phẩm liên quan</h2>
                        <div class="related-products-carousel">
                            <?php 
                            foreach ($prods_relate as $item) {
                                ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo "./" .$item["Picture"] ?>" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="./product_detail.php?id=<?php echo $item["ProductID"] ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="./product_detail.php?id=<?php echo $item["ProductID"] ?>"><?php echo $item["ProductName"] ?></a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$<?php echo $item["Price"] ?></ins> <del>$100.00</del>
                                    </div> 
                                </div>
                            <?php } ?>                                   
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</div>
<?php 
    include_once("footer.php") 
?>