<?php
require_once './mvc/common/validate.php';
class Topping extends Controller
{
    public $tpModel;
    public $ltpModel;

    public function __construct()
    {
        $this->tpModel = $this->model("ToppingModel");
        $this->ltpModel = $this->model("LoaiToppingModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }


    function Index()
    {
        // $listTP = json_decode($this->tpModel->listAll(), true);
        // $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        // // trả về list topping
        // $this->view(
        //     "layoutAdmin",
        //     [
        //         "page" => "topping/indexTP",
        //         'listTP' => $listTP,
        //         'listTenLoaiTP' => $listTenLoaiTP
        //     ]
        // );
        $maTP = "";
        $tenTP = "";
        $MaLoaiTP = "";
        $dongia1 = $dongia2 = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maTP = trim($_POST['maTP']);
            $tenTP = trim($_POST['tenTP']);
            //$banChay = isset($_POST['banChay']) ? $_POST['banChay'] : "";
            $MaLoaiTP = $_POST['MaLoaiTP'];
            $dongia1 = trim($_POST['dongia1']);
            $dongia2 = trim($_POST['dongia2']);
        } //mà mặc định là get rồi '-', uawf thi tu get r ma
        
        $listTP = json_decode($this->tpModel->TimKiem($maTP, $tenTP, $MaLoaiTP, $dongia1, $dongia2), true);
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "topping/indexTP",
                'listTP' => $listTP,
                'listTenLoaiTP' => $listTenLoaiTP,
            ]
        );
    }
    function TimKiem()
    {
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        // $tukhoa ="";
        //  $db_tk = [];
        if (isset($_POST['tukhoa'])) {
            $tukhoa = trim($_POST['tukhoa']);
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


    function Create()
    {
        $listTP = json_decode($this->tpModel->listAll(), true);
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        //tạo mã tự động
        $getma = end($listTP);
        $matp = substr($getma["MaTP"], 2);
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
        $this->view(
            "layoutAdmin",
            [
                "page" => "topping/createTP",
                "matp" => $ma,
                'listTenLoaiTP' => $listTenLoaiTP
            ]
        );
    }

    function Edit($id)
    {
        $tp = json_decode($this->tpModel->getToppingById($id), true);
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);

        if (count($tp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'topping/editTP',
                'tp' => $tp[0],
                'listTenLoaiTP' => $listTenLoaiTP
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    // thêm thành công
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $matp = $_POST['matp'];
            $tentp = $_POST['tentp'];
            $dongia = $_POST['dongia'];
            if ($_FILES["hinh"]['name'] != NULL) {
                $hinh = $_FILES["hinh"]['name'];
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/topping/" . $_FILES["hinh"]["name"]);
            }
            $loaiTP = $_POST['loaiTP'];

            validateTenTP($tentp);
            validateGiaTP($dongia);
            validateAnhTP($_FILES["hinh"]['name']);

            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['tp'] = [
                    'tenTP' => $tentp,
                    'donGia' => $dongia,
                    'ltp' => $loaiTP
                ];
                return $this->redirectTo("Topping", "Create");
            } else {
                $save = $this->model("ToppingModel");
                $save->insert($matp, $tentp, $dongia, $hinh, $loaiTP);
                $_SESSION['thongbao'] = "Thêm mới topping thành công";
            }
        }
        return $this->redirectTo("Topping", "Index");
    }

    function Save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenAnh = "";
            $matp = $_POST['matp'];
            $tentp = $_POST['tentp'];
            $dongia = $_POST['dongia'];
            //$ngaythem = $_POST['ngaythem'];
            // $banChay = $_POST['banchay'] || '0';
            //$banChay = isset($_POST['banchay']) ? $_POST['banchay']  : '0';
            $loaiTP = $_POST['loaiTP'];

            validateTenTP($tentp);
            validateGiaTP($dongia);
            
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['tp'] = [
                    'tenTP' => $tentp,
                    'donGia' => $dongia,
                    'ltp' => $loaiTP
                ];
                return $this->redirectTo("Topping", "Edit", ['id' => $matp]);
            }
            else if (isset($_FILES['hinh']) && $_FILES['hinh']['name'] != "") {
                $hinh = $_FILES['hinh'];
                $tenAnh = $hinh['name'];
                move_uploaded_file($hinh['tmp_name'], "public/upload/topping/" . $tenAnh);
                // $result = $this->tpModel->update($matp, $tentp, $dongia, $tenAnh, $loaiTP);
                $save = $this->model("ToppingModel");
                $save->update($matp, $tentp, $dongia, $tenAnh, $loaiTP);
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            } else {
               // $result = $this->tpModel->update($matp, $tentp, $dongia, null, $loaiTP);
                 $save = $this->model("ToppingModel");
                $save->update($matp, $tentp, $dongia,null, $loaiTP);
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            }

            // if (mysqli_affected_rows($result) == 1 || mysqli_affected_rows($result) == 0) {
            //     $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
            //     return $this->redirectTo("Topping", "Index");
            // }
        }
        return $this->redirectTo("Topping", "Index"); 
    }



    function Delete($id)
    {
        $tp = json_decode($this->tpModel->getToppingById($id), true);
        $listTenLoaiTP = json_decode($this->ltpModel->listAll(), true);
        //view edit
        if (count($tp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'topping/deleteTP',
                'tp' => $tp[0],
                'listTenLoaiTP' => $listTenLoaiTP
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("ToppingModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = " Xóa topping thành công";
        }
        return $this->redirectTo("Topping", "Index");
    }
}
