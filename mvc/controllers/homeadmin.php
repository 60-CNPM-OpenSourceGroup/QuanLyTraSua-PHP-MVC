<?php
class HomeAdmin extends Controller{

    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            header('Location:http://localhost/QuanLyTraSua-PHP-MVC-main/login/index');
        }
    }

    function Index(){
        $this->view("layoutAdmin",[
            "page"=>"index",
        ]);
    }
}
?>