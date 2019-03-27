
<?php 
require_once("./Entities/product.class.php");
?>
<?php include_once("header.php"); ?>
<div class="container">
    <div class="row">
    <?php 
    $prods = Product::list_product();

    if (is_array($prods) || is_object($prods)) {
        foreach ($prods as $item) { ?>
         <div class = 'col-sm-6 col-md-4'>
            <div class = 'thumbnail'>
               <img style="width:350px; height:280px;" src = '<?php echo $item['Picture']; ?>' alt = 'Generic placeholder thumbnail'>
            </div>
            
            <div class = 'caption'>
               <h3>Tên Sản Phẩm:<?php echo $item['ProductName'];?> </h3>
               <p>Mô Tả:<?php echo $item['Description'];?> </p> 
               <p>Giá:<?php echo $item['Price'];?> </p>   
               <p>Số Lượng:<?php echo $item['Quantity'];?> </p>         
               <p>
                  <a href = 'mua.php' class = 'btn btn-primary' role = 'button'>
                     Chọn mua
                  </a> 
                  <a href = 'chitiet.php' class = 'btn btn-primary' role = 'button'>
                     Chi Tiết
                  </a> 
               </p>              
            </div>
         </div>
     <?php   }} ?>

  
    </div> 
</div>

  <?php include_once("footer.php"); ?>
