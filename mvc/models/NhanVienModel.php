<?php
class NhanVienModel extends DataBase {

    public function get(){
        $sql = "SELECT * FROM nhanvien";
        return mysqli_query($this->con,$sql);
    }
}
?>