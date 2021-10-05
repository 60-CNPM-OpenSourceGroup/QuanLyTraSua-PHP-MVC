<?php
class HoaDonModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM hoadon";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function searchMaHDToCreate($id) {
        $qr = "SELECT MaHD FROM hoadon WHERE MaHD LIKE '$id%'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($maHD, $hoten, $sdt, $diachi, $ghichu, $tongtien, $ngaylap) {
        $qr = "INSERT INTO `hoadon` (`MaHD`, `HoTen`, `Sdt`, `DiaChi`, `GhiChu`, `TongTien`, `NgayLap`, `TinhTrang`, `MaNV`) 
        VALUES
        ('$maHD', '$hoten', '$sdt', '$diachi', '$ghichu', $tongtien, '$ngaylap', 0, NULL)";
        $kq = mysqli_query($this->con, $qr);
        return $kq;
    }
}
?>