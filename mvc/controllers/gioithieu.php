<?php
class GioiThieu extends Controller{
    
    function GioiThieu(){
    
        //Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"gioithieu"
            // "SP"=>$sp->SanPham()
        ]
        );
    }
}
?>