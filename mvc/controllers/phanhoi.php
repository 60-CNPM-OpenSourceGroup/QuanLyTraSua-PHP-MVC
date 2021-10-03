<?php
class PhanHoi extends Controller{
    function Index(){
        //Gọi view
        return $this->view("_layoutmenu",
        [
            "page"=>"phanhoi",
        ]);
    }
    function xuly() {
        ///

        return $this->redirectTo("PhanHoi", "Thankyou");
    }
    function thankyou() {
        return ;
    }
}
?>