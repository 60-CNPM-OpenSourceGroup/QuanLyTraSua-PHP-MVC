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
        else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if(!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
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
    function TimKiem()
    {       
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        // $tukhoa ="";
        //  $db_tk = [];
        if(isset($_POST['tukhoa'])){
            $tukhoa = $_POST['tukhoa'];
            $db_tk = json_decode($this->tpModel->TimKiemTP($tukhoa), true);
        }
        // trả về list đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "topping/timkiem",
                // 'listDU' => $listDU,
                'listTenLoaiTP' => $listTenLoaiTP,
                "timkiem" => $db_tk,
                // "thongbao" => $tb
            ]
        );
    }
    

    function Create() {
        $listTP = json_decode($this->tpModel->listAll(), true);
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        //tạo mã tự động
        $getma = end($listTP);
        $madu = substr($getma["MaTP"], 2 );
        $ma = "TP";

        if ((int)$matp < 10) {
            $ma .= "000" . ((int)$matp + 1);
        } else if ((int)$matp >= 10) {
            $ma .= "00" . ((int)$matp + 1);
        } else if ((int)$matp >= 100) {
            $ma .= "0" . ((int)$matp + 1);
        } else if ((int)$matp >= 1000) {
            $ma .= ((int)$matp + 1);
        }
        // thêm mới topping
        $this->view("layoutAdmin",
        [
            "page"=>"topping/createTP",
            "matp" => $ma,
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


    function Store() 
        // thêm thành công
    {
       

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["matp"])) {
                $matp = $_POST['matp'];
            }
            if (isset($_POST["tentp"])) {
                $tentp = $_POST['tentp'];
            }
            if (isset($_POST["dongia"])) {
                $dongia = $_POST['dongia'];
            }
            if ($_FILES["hinh"]['name'] != NULL) {
                $hinh = $_FILES["hinh"]['name'];
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/topping/" . $_FILES["hinh"]["name"]);
            }

            if (isset($_POST["loaiTP"])) {
                $loaiTP = $_POST['loaiTP'];
            }

            $save = $this->model("ToppingModel");
            $save->insert($matp, $tentp, $dongia, $hinh, $loaiTP);
        }

        return $this->redirectTo("Topping", "Index");
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
            if ($_FILES["hinh"]['name'] != NULL) {
                $hinh = $_FILES["hinh"]['name'];
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/topping/" . $_FILES["hinh"]["name"]);
            }
            
            
            if (isset($_POST["loaiTP"])) {
                $loaiTP = $_POST['loaiTP'];
            }


            $save = $this->model("ToppingModel");
            $save->update($id, $tentp, $dongia, $hinh, $loaiTP);
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
