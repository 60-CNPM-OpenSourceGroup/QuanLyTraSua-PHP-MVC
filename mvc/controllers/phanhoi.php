<?php
class PhanHoi extends Controller{
    
    function PhanHoi(){
    
        //Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"phanhoi"
            // "SP"=>$sp->SanPham()
        ]
        );
    }
}
?>