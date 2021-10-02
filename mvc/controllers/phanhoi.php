<?php
class PhanHoi extends Controller{
    
    function Homita(){

        //Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"phanhoi",
        ]);
    }
}
?>