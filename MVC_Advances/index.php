<?php
    require "connection.php";
    //Kiem tra URL
    if(isset($_GET["controller"])){
        $controller=$_GET["controller"];
        //Kiem tra tham so action tren URL;
        if(isset($_GET["action"])){
            $action=$_GET["action"];
        }else{
            $action="index";
        }
    }else{
        //gan controller va action mac dinh;
        $controller="pages";
        $action="home";
    }
    require "routes.php";
?>