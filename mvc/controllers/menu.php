<?php
class Menu extends Controller{

    public $duModel;
    public $lduModel;
    public $tpModel;
    public $ltpModel;

    public function __construct()
    {
        $this->duModel = $this->model("DoUongModel");
        $this->lduModel = $this->model("LoaiDoUongModel");
        $this->tpModel = $this->model("ToppingModel");
        $this->ltpModel = $this->model("LoaiToppingModel");
    }
    public function Index(){
        $listLDU = json_decode($this->lduModel->listAll(), true);
        $listDU = json_decode($this->duModel->listAll(), true);
        $listTP = json_decode($this->tpModel->listAll(), true);
        $this->view("masterpage2", [
            'page' => 'indexMenu',
            'listLDU' => $listLDU,
            'listDU' => $listDU,
            'listTP' => $listTP
        ]);
    }

    public function Details($id){
        $du = json_decode($this->duModel->getDoUongById($id), true);
        $listTP = json_decode($this->tpModel->listAll(), true);
        if(count($du) > 0) {
            $this->view("masterpage2", [
                'page' => 'detailsMenu',
                'du' => $du[0],
                'listTP' => $listTP
            ]);
        }
        else
            echo "Không tìm thấy";
        
    }
}
?>