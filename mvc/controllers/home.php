<?php
class Home extends Controller{

    function Index(){

        // Gọi model
        $sp = $this->model("SanPhamModels");
        // echo $sp->GetSP();

        //Gọi view
        $this->view("masterpage", 
        [
            "page_new"=>"produce_new",
            "page_hot"=>"produce_hot",
            "SPn"=>$sp->SanPham_New(),
            "SPh"=>$sp->SanPham_Hot()
        ]
        );
    }

}
?>