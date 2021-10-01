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
?>