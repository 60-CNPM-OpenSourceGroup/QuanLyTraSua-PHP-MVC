<?php
class GioiThieu extends Controller{
    
    function Index(){
        //Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"gioithieu",
        ]);
    }
    
}
?>