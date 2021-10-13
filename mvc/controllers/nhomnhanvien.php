<?php
class NhomNhanVien extends Controller{

    public $nnvModel;
    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
        $this->nvModel = $this->model("NhomNhanVienModel");
    }

    function Index(){
        $listNNV = json_decode($this->nvModel->getNNV(), true);
        $this->view("layoutAdmin",
        [
            "page"=>"nhomnhanvien/indexNNV",
            'listNNV' => $listNNV
        ]
    );
    }
    function details($id) {
        //view chi tiết nhân viên
    }
    function Create() {
        // thêm mới nhân viên
    }

    function Store() {
        // thêm thành công
        //return redirectTo("NhanVien", "Index")
    }
    function edit($id) {
        //view edit
    }
    function save() {
        // sửa thành công, lưu
        //return redirectTo("NhanVien", "Index")
    }

    function delete($id) {
        //view edit
    }

}
?>