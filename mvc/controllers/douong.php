<?php
class DoUong extends Controller{
    public $duModel;
    public $lduModel;

    public function __construct()
    {
        $this->duModel = $this->model("DoUongModel");
        $this->lduModel = $this->model("LoaiDoUongModel");

        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
    }
    

    function Index(){
        $listDU = json_decode($this->duModel->listAll(), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        // trả về list đồ uống
        $this->view("layoutAdmin",
        [
            "page"=>"douong/indexDU",
            'listDU' => $listDU,
            'listTenLoaiDU' => $listTenLoaiDU
        ]
    );
    }
    
    // function Details($id) {
    //     //view chi tiết đồ uống
    //     $this->view("layoutAdmin",
    //     [
    //         "page"=>"douong/detailDU"
    //     ]
    //     );
    // }

    function Create() {
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        // thêm mới đồ uống
        $this->view("layoutAdmin",
        [
            "page"=>"douong/createDU",
            'listTenLoaiDU' => $listTenLoaiDU
        ]
        );
    }

    function Edit($id) {
        $du = json_decode($this->duModel->getDoUongById($id), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);

        // echo "<pre>";
        // print_r($listTenLoaiDU);
        // echo "</pre>";
        
        //view edit
        if(count($du) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'douong/editDU',
                'du' => $du[0],
                'listTenLoaiDU' => $listTenLoaiDU
            ]);
        }
        else
            echo "Không tìm thấy";
    }


    function Store() {
        // thêm thành công
        //return redirectTo("DoUong", "Index")
    }

    

    function Save($id) {
        //sửa thành công, lưu
        //return redirectTo("DoUong", "Index")
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["tendu"])) {
                $tendu = $_POST['tendu'];
            }
            if (isset($_POST["dongia"])) {
                $dongia = $_POST['dongia'];
            }
            if (isset($_POST["anhdu"])) {
                $anhdu = $_POST['anhdu'];
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

            // echo $id. " ". $tendu ." ". $dongia." ". $anhdu." ". $ngaythem ." ".$banchay." ". $loaiDU ;

            $save = $this->model("DoUongModel");
            $save->update($id, $tendu);
        }
        return $this->redirectTo("DoUong", "Index");
    }

    function Delete($id) {
        $du = json_decode($this->duModel->getDoUongById($id), true);
        $listTenLoaiDU = json_decode($this->lduModel->listAll(), true);
        //view edit
        if(count($du) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'douong/deleteDU',
                'du' => $du[0],
                'listTenLoaiDU' => $listTenLoaiDU
            ]);
        }
        else
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
