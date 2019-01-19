<?php

class BaseController
{
    protected $foder;
    public  function render($file,$data=array())
    {
        $view_file="views/".$this->foder.'/'.$file.'.php';
        //Kiểm tra sự tồn tại của file này đã có trong thư mục chưa
        if (is_file($view_file))
        {
            //Phân rã dữ liệu từ mảng 'data'
            extract($data);
            //Khởi động bộ nhớ của máy tính để lữu trữ
            ob_start();
            require_once $view_file;
            //Đẩy dữ liệu từ bộ nhớ đệm vào biến content
            $content=ob_get_clean();
            //require template application để biểu diễn dữ liệu từ content
            require "views/layouts/application.php";
        }
        else
        {
            header("location:index.php?controller=pages&action=error");
        }
    }
}

?>