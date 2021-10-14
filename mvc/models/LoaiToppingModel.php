<?php
class LoaiToppingModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM loaitopping";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
    public function getLoaiToppingById($id) {
        $qr = "SELECT * FROM loaitopping WHERE MaLoaiTP = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>