<?php
class DoUongModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM douong";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getDoUongById($id) {
        $qr = "SELECT * FROM douong,loaidouong WHERE douong.MaLoaiDU = loaidouong.MaLoaiDU AND MaDU = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function update($madu, $tendu) 
    {
        $qr = "UPDATE douong SET TenDU = $tendu WHERE douong.MaDU = '$madu'";        
        return mysqli_query($this->con, $qr);
    }

    public function delete($madu) {
        $qr = "DELETE FROM douong WHERE MaDU = '$madu'";
        return mysqli_query($this->con, $qr);
    }
}
