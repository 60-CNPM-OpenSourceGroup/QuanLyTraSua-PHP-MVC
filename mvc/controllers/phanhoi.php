<?php
class PhanHoi extends Controller{
    function Index(){
        //Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"phanhoi",
        ]);
    }
}
?>