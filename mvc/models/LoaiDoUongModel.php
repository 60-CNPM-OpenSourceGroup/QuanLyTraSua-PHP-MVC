<?php
class LoaiDoUongModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM loaidouong";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getLoaiDoUongById($id) {
        $qr = "SELECT * FROM loaidouong WHERE MaLoaiDU = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>