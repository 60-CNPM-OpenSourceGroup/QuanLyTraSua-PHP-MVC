<?php
class GioHang extends Controller {
    public $hoadonModel;
    public $cthoadonModel;
    public function __construct()
    {
        $this->hoadonModel = $this->model("HoaDonModel");
        $this->cthoadonModel = $this->model("CTHoaDonModel");
    }

    public function index() {
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $this->view("masterpage2", [
            "page" => "indexGioHang"
        ]);
    }

    
} 
?>