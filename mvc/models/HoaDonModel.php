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
}
?>