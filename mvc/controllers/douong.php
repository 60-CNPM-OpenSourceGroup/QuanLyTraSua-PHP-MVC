<?php
class DoUong extends Controller{
    public $duModel;
    public function __construct()
    {
        $this->duModel = $this->model("DoUongModel");

        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
    }

    function Index(){
        $listDU = json_decode($this->duModel->listAll(), true);
        // trả về list đồ uống
        $this->view("layoutAdmin",
        [
            "page"=>"douong/indexDU",
            'listDU' => $listDU
        ]
    );
    }
    
    function Details($id) {
        //view chi tiết đồ uống
        $this->view("layoutAdmin",
        [
            "page"=>"douong/detailDU"
        ]
        );
    }

    function Create() {
        // thêm mới đồ uống
        $this->view("layoutAdmin",
        [
            "page"=>"douong/createDU"
        ]
        );
    }

    function Store() {
        // thêm thành công
        //return redirectTo("DoUong", "Index")
    }
    function Edit($id) {
        $du = json_decode($this->duModel->getDoUongById($id), true);
        //view edit
        if(count($du) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'douong/editDU',
                'du' => $du[0],
            ]);
        }
        else
            echo "Không tìm thấy";
    }
    function Save() {
        // sửa thành công, lưu
        //return redirectTo("DoUong", "Index")
    }

    function Delete($id) {
        $du = json_decode($this->duModel->getDoUongById($id), true);
        //view edit
        if(count($du) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'douong/deleteDU',
                'du' => $du[0],
            ]);
        }
        else
            echo "Không tìm thấy";
    }
}
?>