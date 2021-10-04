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
    function details($id) {
        //view chi tiết đồ uống
    }
    function Create() {
        // thêm mới đồ uống
    }

    function Store() {
        // thêm thành công
        //return redirectTo("DoUong", "Index")
    }
    function edit($id) {
        //view edit
    }
    function save() {
        // sửa thành công, lưu
        //return redirectTo("DoUong", "Index")
    }

    function delete($id) {
        //view edit
    }
}
?>