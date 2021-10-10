<?php
class NhomNhanVienModel extends DataBase {

    public function getNNV()
    {
        $qr = "SELECT * FROM nhomnhanvien";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>