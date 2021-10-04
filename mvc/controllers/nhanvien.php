<?php
class NhanVien extends Controller{

    public $nvModel;
    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
        $this->nvModel = $this->model("NhanVienModel");
    }

    public function Index(){
        // trả về list đồ uống
        $this->view("layoutAdmin", [
            "page"=>"nhanvien/indexNV",
            "NhanVien"=>$this->nvModel->get(),
        ]);
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