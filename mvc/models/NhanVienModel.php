<?php
class NhanVienModel extends DataBase {
    public function getNV()
    {
        $qr = "SELECT * FROM nhanvien";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function listShipper()
    {
        $qr = "SELECT * FROM nhanvien, nhomnhanvien WHERE nhanvien.IDNhom = nhomnhanvien.IDNhom AND nhanvien.IDNhom = 'SHIPPER'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getShipperById($id)
    {
        $qr = "SELECT * FROM nhanvien, nhomnhanvien WHERE nhanvien.IDNhom = nhomnhanvien.IDNhom AND nhanvien.IDNhom = 'SHIPPER' AND nhanvien.maNV = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>