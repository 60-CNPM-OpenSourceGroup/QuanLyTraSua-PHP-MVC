<?php
class GioiThieu extends Controller{
    
    function Homita(){

        //Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"gioithieu",
        ]);
    }
}
?>