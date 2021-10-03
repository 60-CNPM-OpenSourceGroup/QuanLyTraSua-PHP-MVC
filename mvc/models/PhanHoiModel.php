<?php
class PhanHoiModel extends DataBase{
    public function SentPhanHoi($hoTen = "", $sdt = "", $email = "", $noiDung = "")
    {
        // $qr = "SELECT * FROM phanhoi";
        // $rows = mysqli_query($this->con, $qr);
        // $arr = array();

        // while($row = mysqli_fetch_array($rows)) {
        //     $arr[] = $row;
        // }
        
        // if($arr['id'] == ""){
        //     $id = 1;            
        // }
        // else{
        //     $qr = "SELECT * FROM phanhoi WHERE id=(SELECT MAX(id) FROM phanhoi)";
        //     $qr = mysqli_query($this->con, $qr);
        //     $id = $qr + 1;    
        // }

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