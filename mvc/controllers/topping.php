<?php
class Topping extends Controller{
    public $tpModel;
    public function __construct()
    {
        $this->tpModel = $this->model("ToppingModel");

        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
    }

    function Index(){
        $listTP = json_decode($this->tpModel->listAll(), true);
        // trả về list topping
        $this->view("layoutAdmin",
        [
            "page"=>"topping/indexTP",
            'listTP' => $listTP
        ]
    );
    }
    
    function Details($id) {
        //view chi tiết topping
        $this->view("layoutAdmin",
        [
            "page"=>"topping/detailTP"
        ]
        );
    }

    function Create() {
        // thêm mới topping
        $this->view("layoutAdmin",
        [
            "page"=>"topping/createTP"
        ]
        );
    }

    function Store() {
        // thêm thành công topping

    }
    function Edit($id) {
        $tp = json_decode($this->tpModel->getToppingById($id), true);
        //view edit
        if(count($tp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'topping/editTP',
                'tp' => $tp[0],
            ]);
        }
        else
            echo "Không tìm thấy";
    }
    function Save() {
        // sửa thành công, lưu
    }

    function Delete($id) {
        $tp = json_decode($this->tpModel->getToppingById($id), true);
        //view edit
        if(count($tp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'topping/deleteTP',
                'tp' => $tp[0],
            ]);
        }
        else
            echo "Không tìm thấy";
    }
}
?>