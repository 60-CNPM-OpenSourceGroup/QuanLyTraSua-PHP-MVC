<?php
class PhanHoiModel extends DataBase{
    
    public function SentPhanHoi($hoTen = "", $sdt = "", $email = "", $noiDung = "")
    {

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");            
        $ngayGui = $date;
        $tinhTrang = 1;
        $qr = "INSERT INTO phanhoi (id, hoTen, sdt, email, noiDung, ngayGui, tinhTrang)
                VALUES ('', '$hoTen', '$sdt', '$email', '$noiDung', '$ngayGui', '$tinhTrang')";

        return mysqli_query($this->con, $qr);
        
    }
}
?>