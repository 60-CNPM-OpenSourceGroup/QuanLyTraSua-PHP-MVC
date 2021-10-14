<?php
class Topping extends Controller{
    public $tpModel;
    public $ltpModel;

    public function __construct()
    {
        $this->tpModel = $this->model("ToppingModel");
        $this->ltpModel = $this->model("LoaiToppingModel");

        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
    }
    

    function Index(){
        $listTP = json_decode($this->tpModel->listAll(), true);
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        // trả về list topping
        $this->view("layoutAdmin",
        [
            "page"=>"topping/indexTP",
            'listTP' => $listTP,
            'listTenLoaiTP' => $listTenLoaiTP
        ]
    );
    }
    

    function Create() {
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        // thêm mới topping
        $this->view("layoutAdmin",
        [
            "page"=>"topping/createTP",
            'listTenLoaiTP' => $listTenLoaiTP
        ]
        );
    }

    function Edit($id) {
        $tp = json_decode($this->tpModel->getToppingById($id), true);
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);

        if(count($tp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'topping/editTP',
                'tp' => $tp[0],
                'listTenLoaiTP' => $listTenLoaiTP
            ]);
        }
        else
            echo "Không tìm thấy";
    }


    function Store() {
        // thêm thành công

    }  

    function Save($id) {
        //sửa thành công, lưu

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["tentp"])) {
                $tentp = $_POST['tentp'];
            }
            if (isset($_POST["dongia"])) {
                $dongia = $_POST['dongia'];
            }
            if (isset($_POST["anhtp"])) {
                $anhdu = $_POST['anhtp'];
            }
            
            
            if (isset($_POST["loaiTP"])) {
                $loaiTP = $_POST['loaiTP'];
            }


            $save = $this->model("ToppingModel");
            $save->update($id, $tentp);
        }
        return $this->redirectTo("Topping", "Index");
    }

    function Delete($id) {
        $tp = json_decode($this->tpModel->getToppingById($id), true);
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        //view edit
        if(count($tp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'topping/deleteTP',
                'tp' => $tp[0],
                'listTenLoaiTP' => $listTenLoaiTP
            ]);
        }
        else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("ToppingModel");
            $confirm->delete($id);
        }
        return $this->redirectTo("Topping", "Index");
    }
}
