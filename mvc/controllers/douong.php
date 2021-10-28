<?php
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
                'listTenLoaiDU' => $listTenLoaiDU
            ]
        );
    }

    function Create()
    {
        $listDU = json_decode($this->duModel->listAll(), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        //tạo mã tự động
        $dem = count($listDU);
        $madu = "DU";
        if ($dem < 10) {
            $madu .= "000" . ($dem + 1);
        } else if ($dem >= 10) {
            $madu .= "00" . ($dem + 1);
        } else if ($dem >= 100) {
            $madu .= "0" . ($dem + 1);
        } else if ($dem >= 1000) {
            $madu .= ($dem + 1);
        }
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "douong/createDU",
                "madu" => $madu,
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
        $listDU = json_decode($this->duModel->listAll(), true);
        //tạo mã tự động
        $dem = count($listDU);
        $madu = "DU";
        if ($dem < 10) {
            $madu .= "000" . ($dem + 1);
        } else if ($dem >= 10) {
            $madu .= "00" . ($dem + 1);
        } else if ($dem >= 100) {
            $madu .= "0" . ($dem + 1);
        } else if ($dem >= 1000) {
            $madu .= ($dem + 1);
        }

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
            $save->insert($madu, $tendu, $dongia, $hinh, $ngaythem, $banchay, $loaiDU);
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
        }
        return $this->redirectTo("DoUong", "Index");
    }
}
