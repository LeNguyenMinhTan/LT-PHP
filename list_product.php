
<?php 
require_once("./Entities/product.class.php");
require_once("./Entities/category.class.php");
?>
<?php 
    include_once("header.php"); 
    if (!isset($_GET["cateid"])) {
        $prods = Product::list_product();
    } else {
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateid($cateid);
    }
        $cates = Category::list_category();
?>
<div class="container">
    <div class="col-sm-3">
        
            <h2>Danh mục</h2>
            <ul class="list-group">
                <?php 
                foreach ($cates as $item) {
                ?>
                <li class="list-group-item"><?php
                    echo "<a
                    href=/LT-PHP/list_product.php?cateid=" . $item["CateID"] . ">" . $item["CategoryName"] . "</a>";
                ?>
                </li>
                <?php
                    }
                ?>
            </ul>
       
    </div>
    <div class="col-sm-9">
        <div class="row">
            <?php 
          
          
                foreach ($prods as $item) { ?>
                <div class = 'col-sm-6 col-md-4'>
                    <div class = 'thumbnail'>
                    <img style="width:350px; height:280px;" src = '<?php echo $item['Picture']; ?>' alt = 'Generic placeholder thumbnail'>
                    </div>
                    
                    <div class = 'caption'>
                    <h3><?php echo $item['ProductName'];?> </h3>
                    <p>Mô Tả:<?php echo $item['Description'];?> </p> 
                    <p>Giá:<?php echo $item['Price'];?> </p>   
                    <p>Số Lượng:<?php echo $item['Quantity'];?> </p>         
                    <p>
                        <a href = './mua.php' class = 'btn btn-primary' role = 'button'>
                            Chọn mua
                        </a> 
                        <a href="/LT-PHP/product_detail.php?id=<?php echo $item["ProductID"] ?>" class = 'btn btn-primary' role = 'button'>
                            Chi Tiết
                        </a>
                    </p>              
                    </div>
                </div>
            <?php   } ?>
        </div> 
    </div>
</div>

  <?php include_once("footer.php"); ?>
