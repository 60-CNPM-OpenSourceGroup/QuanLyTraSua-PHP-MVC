<<<<<<< HEAD
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
=======
<?php
class Menu extends Controller{
    


    function Menu(){

        // Gọi model
        $sp = $this->model("SanPhamModels");

        // Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"menu",
            "du"=>$sp->GetSP(),
            "ldu"=>$sp->LoaiDoUong(),
            "topping"=>$sp->Topping()
        ]
        );
    }

    function Details($id){
        
        // Gọi model
        $sp = $this->model("SanPhamModels");
        // if($id == null){
        //     return http_response_code(404); 
        // }
        // // Gọi model
        // $sp = $this->model("SanPhamModels");
        // $checkId = array_search($id, ($sp->GetSP()));

        // if($checkId == null || $checkId == ""){
        //     return CURLE_HTTP_NOT_FOUND;
        // }
        // else{
            
        // }

        // Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"details_sp",
            "du"=>$sp->GetSP(),
            "topping"=>$sp->Topping()
            // "ldu"=>$sp->LoaiDoUong(),
            // "topping"=>$sp->Topping()
        ]
        );
        
    }
}
>>>>>>> 38f760c11d5805b0476b381e41435409f56e1be7
?>