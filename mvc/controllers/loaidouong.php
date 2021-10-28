<?php
class LoaiDoUong extends Controller
{
    public $lduModel;

    public function __construct()
    {
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
        $listLDU = json_decode($this->lduModel->listAll(), true);
        // trả về list đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "loaidouong/indexLDU",
                'listLDU' => $listLDU
            ]
        );
    }

    function Create()
    {
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "loaidouong/createLDU"
            ]
        );
    }

    function Edit($id)
    {
        $ldu = json_decode($this->lduModel->getLoaiDoUongById($id), true);
        //view edit
        if (count($ldu) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'loaidouong/editLDU',
                'ldu' => $ldu[0],
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    {
        // thêm thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["maldu"])) {
                $maldu = $_POST['maldu'];
            }
            if (isset($_POST["tenldu"])) {
                $tenldu = $_POST['tenldu'];
            }
            $result = $this->lduModel->checkPK($maldu);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['error'] = "Mã loại đồ uống đã tồn tại";
                return $this->redirectTo("LoaiDoUong", "Create");
            }
            else{
                $save = $this->model("LoaiDoUongModel");
                $save->insert($maldu, $tenldu);
                $_SESSION['thongbao'] = "Thêm mới loại đồ uống thành công";
            }
            
        }

        return $this->redirectTo("LoaiDoUong", "Index");
    }

    function Save($id)
    {
        //sửa thành công, lưu
        //return redirectTo("DoUong", "Index")
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["tenloaidu"])) {
                $tenldu = $_POST['tenloaidu'];
            }

            $save = $this->model("LoaiDoUongModel");
            $save->update($id, $tenldu);
        }

        return $this->redirectTo("LoaiDoUong", "Index");
    }



    function Delete($id)
    {
        $ldu = json_decode($this->lduModel->getLoaiDoUongById($id), true);

        //view edit
        if (count($ldu) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'loaidouong/deleteLDU',
                'ldu' => $ldu[0],
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("LoaiDoUongModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa loại đồ uống thành công";
        }
        return $this->redirectTo("LoaiDoUong", "Index");
    }
}
