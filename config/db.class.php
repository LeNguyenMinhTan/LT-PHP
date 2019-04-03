<?php 
    class Db{
        //bien kết nối csdl
        protected static $connection;
        //khởi tạo hàm kết nối
        public function connect(){
            //kết nối tới csdl trong trường hợp chưa dc khởi tạo kết nối
            if (!isset(self::$connection)) {
                //Lấy thông tin kết nối từ tập tin config
                $config = parse_ini_file("config.ini");
                self::$connection = new mysqli("localhost", 
                    $config["username"], $config["password"], $config["databasename"]);
            }
            //xử lý lỗi nếu ko kết nội dc csdl
            if (self::$connection ==  false) {
                # code...
                return false;
            }
            return self::$connection;
        }
        public function query_execute($queryString){
            //khởi tạo kết nối
            $connection = $this->connect();
            //vietnamese
            $connection->query("SET NAMES utf8");
            //execute truy vấn
            $result = $connection->query($queryString);
           // $connection->close();
            return $result;
        }
        //Hàm trả về 1 ds kết quả
        public function select_to_array($queryString){
            $row = array();
            $result = $this->query_execute($queryString);
            if (!$result) {
                # code...
                return false;
            }
            while ($item = $result->fetch_assoc()) {
                # code...
                $row[] = $item;
            }
            return $row;
        }
    }
?>