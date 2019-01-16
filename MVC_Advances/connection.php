<?php
    class DB{
        private static $instance=NULL;
        public static function getConnection(){
            if(!isset(self::$instance)){
                try{
                    self::$instance=new PDO("mysql:host=localhost;dbname=mvc_demo;charset=utf8","root","");
                }catch(PDOException $ex){
                    echo "Co loi xay ra trong qua trinh ket noi.".$ex->getMessage();
                }
            }
            return self::$instance;
        }
    }
?>