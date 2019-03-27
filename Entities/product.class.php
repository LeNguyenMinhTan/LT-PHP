<?php 
    require_once("./config/db.class.php");

    class Product{
        public $productID;
        public $productName;
        public $cateID;
        public $price;
        public $quantity;
        public $description;
        public $picture;

        public function __construct($productName, $cateID, $price, $quantity, $description, $picture)
        {
            # code...
            $this->productName = $productName;
            $this->cateID = $cateID;
            $this->price = $price;
            $this->quantity = $quantity;
            $this->description = $description;
            $this->picture = $picture;
        }

        //lưu sp
        public function save()
        {
            $file_temp = $this->picture["tmp_name"];
            $user_file = $this->picture["name"];
            $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
            $filepath = "img/".$timestamp.$user_file;
            //$filepath = $timestamp.$user_file;

            if(move_uploaded_file($file_temp, $filepath)==false)
            {
                return false;
            }
            # code...
            $db = new Db();
            //Thêm product vào csdl
            $sql = "INSERT INTO `product` (`ProductName` , `CateID` , `Price` , `Quantity` , `Description` , `Picture` )
                    VALUES ( '$this->productName', '$this->cateID', '$this->price', '$this->quantity', '$this->description', '$filepath' ) ";
            $result = $db->query_execute($sql);
            return $result;
        }

        public static function list_product(){
            $db = new Db();
            $sql = "SELECT * FROM product";
            $result = $db->select_to_array($sql);
            return $result;
        }
    }
?>