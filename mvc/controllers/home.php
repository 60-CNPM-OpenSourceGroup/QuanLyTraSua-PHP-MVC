<?php
class Home extends Controller{

    function Index(){

        // Gọi model
        // $sp = $this->model("spmodels");
        // echo $sp->GetSP();

        //Gọi view
        $this->view("masterpage" 
        //[
        //     "page"=>"produce",
        //     "SP"=>$sp->GetSP()
        // ]
        );
    }

    // function Show(){

    //     // Gọi Model
    //     $sp = $this->model("sanphammodel");
    //     // $tong = $sv->Tong($a, $b);

        
    // }
}
?>