<?php
require_once './mvc/common/validate.php';
class DoUong extends Controller
{
    public $duModel;
    public $lduModel;

    public function __construct()
    {
        $this->duModel = $this->model("DoUongModel");
        $this->lduModel = $this->model("LoaiDoUongModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        }
        else {
            $pq = new HasCredentials("QUANLYDANHMUC");
            if(!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }


    function Index()
    {
        $listDU = json_decode($this->duModel->listAll(), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        // trả về list đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "douong/indexDU",
                'listDU' => $listDU,
                'listTenLoaiDU' => $listTenLoaiDU,
            ]
        );
    }

    function TimKiem()
    {       
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        // $tukhoa ="";
        //  $db_tk = [];
        if(isset($_POST['tukhoa'])){
            $tukhoa = $_POST['tukhoa'];
            $db_tk = json_decode($this->duModel->TimKiemDU($tukhoa), true);
        }
        
        // trả về list đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "douong/timkiem",
                // 'listDU' => $listDU,
                'listTenLoaiDU' => $listTenLoaiDU,
                "timkiem" => $db_tk,
                // "thongbao" => $tb
            ]
        );
    }

    function Create()
    {
        $listDU = json_decode($this->duModel->listAll(), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);

        //tạo mã tự động
        $getma = end($listDU);
        $madu = substr($getma["MaDU"], 2 );
        $ma = "DU";

        if ((int)$madu < 10) {
            $ma .= "000" . ((int)$madu + 1);
        } else if ((int)$madu >= 10) {
            $ma .= "00" . ((int)$madu + 1);
        } else if ((int)$madu >= 100) {
            $ma .= "0" . ((int)$madu + 1);
        } else if ((int)$madu >= 1000) {
            $ma .= ((int)$madu + 1);
        }
        
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "douong/createDU",
                "madu" => $ma,
                'listTenLoaiDU' => $listTenLoaiDU
            ]
        );
    }

    function Edit($id)
    {
        $du = json_decode($this->duModel->getDoUongById($id), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);

        //view edit
        if (count($du) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'douong/editDU',
                'du' => $du[0],
                'listTenLoaiDU' => $listTenLoaiDU
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $madu = $_POST['madu'];
            $tendu = $_POST['tendu'];
            $dongia = $_POST['dongia']; 
            if ($_FILES["hinh"]['name'] != NULL) {
                $hinh = $_FILES["hinh"]['name'];
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/douong/" . $_FILES["hinh"]["name"]);
            }
            $ngaythem = $_POST['ngaythem'];
            $banChay = $_POST['banchay'];
            $loaiDU = $_POST['loaiDU'];
            
            validateTenDU($tendu);
            validateGia($dongia);
            validateAnhDU($_FILES["hinh"]['name']);
            validateNgayThem($ngaythem);
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['du'] = [
                    'tenDU' => $tendu,
                    'donGia' => $dongia,
                    'ngayThem' => $ngaythem,
                    'banChay' => $banChay,
                    'ldu' => $loaiDU
                ];
                return $this->redirectTo("DoUong", "Create");
            } else {
                $save = $this->model("DoUongModel");
                $save->insert($madu, $tendu, $dongia, $hinh, $ngaythem, $banChay, $loaiDU);
                $_SESSION['thongbao'] = "Thêm mới đồ uống thành công";
            }
        }

        return $this->redirectTo("DoUong", "Index");
    }



    function Save($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["tendu"])) {
                $tendu = $_POST['tendu'];
            }
            if (isset($_POST["dongia"])) {
                $dongia = $_POST['dongia'];
            }

            if ($_FILES["hinh"]['name'] != NULL) {
                $hinh = $_FILES["hinh"]['name'];
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/douong/" . $_FILES["hinh"]["name"]);
            }

            if (isset($_POST["ngaythem"])) {
                $ngaythem = $_POST['ngaythem'];
                $ngaythem = str_replace('/', '-', $ngaythem);
                $ngaythem = date('Y-m-d', strtotime($ngaythem));
            }
            
            if (isset($_POST["banchay"])) {
                $banchay = $_POST['banchay'];
            }

            if (isset($_POST["loaiDU"])) {
                $loaiDU = $_POST['loaiDU'];
            }

            $save = $this->model("DoUongModel");
            $save->update($id, $tendu, $dongia, $hinh, $ngaythem, $banchay, $loaiDU);
        }
        return $this->redirectTo("DoUong", "Index");
    }

    function Delete($id)
    {
        $du = json_decode($this->duModel->getDoUongById($id), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        //view edit
        if (count($du) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'douong/deleteDU',
                'du' => $du[0],
                'listTenLoaiDU' => $listTenLoaiDU
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("DoUongModel");
            $confirm->delete($id);   
            $_SESSION['thongbao'] = " Xóa đồ uống thành công";
        }
        return $this->redirectTo("DoUong", "Index");
    }
}
