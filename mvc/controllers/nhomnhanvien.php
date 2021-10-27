<?php
class NhomNhanVien extends Controller{

    public $nnvModel;
    public function __construct()
    {
        $this->nnvModel = $this->model("NhomNhanVienModel");
        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
    }

    function Index(){
        $listNNV = json_decode($this->nnvModel->getNNV(), true);
        $this->view("layoutAdmin",
        [
            "page"=>"nhomnhanvien/indexNNV",
            'listNNV' => $listNNV
        ]
    );
    }

    function Create()
    {
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "nhomnhanvien/createNNV"
            ]
        );
    }

    function Store()
    {
        // thêm thành công
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["idNhom"])) {
                $idNhom = $_POST['idNhom'];
            }
            if (isset($_POST["tenNhom"])) {
                $tenNhom = $_POST['tenNhom'];
            }
            $save = $this->model("NhomNhanVienModel");
            $save->insert($idNhom, $tenNhom);
            
        }
        return $this->redirectTo("NhomNhanVien", "Index");
    }


    function Delete($id)
    {
        $nnv = json_decode($this->nnvModel->getNhomNhanVienById($id), true);

        //view edit
        if (count($nnv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhomnhanvien/deleteNNV',
                'nnv' => $nnv[0],
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("NhomNhanVienModel");
            $confirm->delete($id);
        }
        return $this->redirectTo("NhomNhanVien", "Index");
    }

    

}
?>