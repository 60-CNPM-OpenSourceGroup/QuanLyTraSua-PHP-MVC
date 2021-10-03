<?php
class PhanHoi extends Controller{

    function Index(){
        //Gọi view
        $this->view("_layoutmenu",
        [
            "page"=>"phanhoi",
        ]);
    }

    function GuiPhanHoi($hoTen = "", $sdt = "", $email = "", $noiDung = ""){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["hoTen"])) { 
                $hoTen = $_POST['hoTen']; 
            }
            if(isset($_POST["sdt"])) { 
                $sdt = $_POST['sdt']; 
            }
            if(isset($_POST["email"])) { 
                $email = $_POST['email']; 
            }
            if(isset($_POST["noiDung"])) { 
                $noiDung = $_POST['noiDung']; 
            }
        
            $sent = $this->model("PhanHoiModel");
            $sent->SentPhanHoi($hoTen, $sdt, $email, $noiDung);
            //Code xử lý, insert dữ liệu vào table
            
        
            // if ($connect->query($qr) === TRUE) {
            //     echo "Thêm dữ liệu thành công";
            // } else {
            //     echo "Error: " . $qr . "<br>" . $connect->error;
            // }
        }

        $this->view("_layoutmenu",
        [
            "page"=>"thankyou"
        ]
        );
    }
}
?>