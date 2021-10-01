<?php
class SanPhamModels extends DataBase{

    public function GetSP(){
        // kết nối db sau
        return "MB";
    }

    public function SanPham(){
        $qr = "SELECT * FROM douong";
        return mysqli_query($this->con, $qr);
    }   
}
?>