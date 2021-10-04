<?php
class DoUong extends Controller{

    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
    }

    function Index(){
        // trả về list đồ uống
        $this->view("layoutAdmin",
        [
            "page"=>"douong/indexDU"
        ]
    );
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