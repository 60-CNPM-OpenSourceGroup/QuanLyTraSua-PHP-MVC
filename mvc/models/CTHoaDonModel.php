<?php
class CTHoaDonModel extends DataBase {
    public function listAll(){
        $qr = "SELECT * FROM chitiethd";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($maHD, $maDU, $size, $thoigianthem, $soluong, $da, $duong) {
        $qr = "INSERT INTO `ChiTietHD` (`MaHD`, `MaDU`, `Size`, `ThoiGianThem`, `SoLuong`, `PhanTramDa`, `PhanTramDuong`) 
        VALUES 
        ('$maHD', '$maDU', '$size', '$thoigianthem', $soluong, $da, $duong)";
        mysqli_query($this->con, $qr);
    }
}
?>