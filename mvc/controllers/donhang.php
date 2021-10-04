<?php
class DonHang extends Controller{

    public $dhModel;
    public $cthdModel;

    public function __construct()
    {
        $this->dhModel = $this->model("HoaDonModel");
        // $this->dhModel = $this->model("CTHoaDonModel");

        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
    }

    function Index(){

        $listHD = json_decode($this->dhModel->listAll(), true);
        // $listCTHD = json_decode($this->dhModel->listAll(), true);
        
        $this->view("layoutAdmin", [
            'page' => 'DonHang/indexDH',
            'listHD' => $listHD
            // 'listCTHD' => $listCTHD
        ]);
    }
    function Details($id) {
        //view chi tiết đồ uống

        $this->view("layoutAdmin", [
            'page' => 'DonHang/detailsDH'
            // 'listCTHD' => $listCTHD
        ]);
    }
    function Print() {
        // thêm mới đồ uống
        $this->view("layoutAdmin", [
            'page' => 'DonHang/printDH'
            // 'listCTHD' => $listCTHD
        ]);
    }

    function Store() {
        // thêm thành công
        //return redirectTo("DoUong", "Index")
    }
    function Check($id) {
        //view edit
        $this->view("layoutAdmin", [
            'page' => 'DonHang/checkDH'
            // 'listCTHD' => $listCTHD
        ]);
    }
    function Save() {
        // sửa thành công, lưu
        //return redirectTo("DoUong", "Index")
    }

    function Delete($id) {
        //view edit
        $this->view("layoutAdmin", [
            'page' => 'DonHang/deleteDH'
            // 'listCTHD' => $listCTHD
        ]);
    }
}
?>