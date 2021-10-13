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
        //return redirectTo("DoUong", "Index")
    }



    function Save($id)
    {
        //sửa thành công, lưu
        //return redirectTo("DoUong", "Index")
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
}
