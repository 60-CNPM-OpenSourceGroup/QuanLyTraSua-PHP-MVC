<?php
class LoaiTopping extends Controller
{
    public $ltpModel;

    public function __construct()
    {
        $this->ltpModel = $this->model("LoaiToppingModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        }
    }


    function Index()
    {
        $listLTP = json_decode($this->ltpModel->listAll(), true);
        // trả về list topping
        $this->view(
            "layoutAdmin",
            [
                "page" => "loaitopping/indexLTP",
                'listLTP' => $listLTP
            ]
        );
    }

    function Create()
    {
        // thêm mới topping
        $this->view(
            "layoutAdmin",
            [
                "page" => "loaitopping/createLTP"
            ]
        );
    }

    function Edit($id)
    {
        $ltp = json_decode($this->ltpModel->getLoaiToppingById($id), true);
        //view edit
        if (count($ltp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'loaitopping/editLTP',
                'ltp' => $ltp[0],
            ]);
        } else
            echo "Không tìm thấy";
    }


    function Store()
    {
        // thêm thành công
    }



    function Save($id)
    {
        //sửa thành công, lưu

    }

    function Delete($id)
    {
        $ltp = json_decode($this->ltpModel->getLoaiToppingById($id), true);

        //view edit
        if (count($ltp) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'loaitopping/deleteLTP',
                'ltp' => $ltp[0],
            ]);
        } else
            echo "Không tìm thấy";
    }
}
