<?php
class ToppingModel extends DataBase {

    public function listAll(){
        $qr = "SELECT * FROM topping";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getToppingById($id) {
        $qr = "SELECT * FROM topping,loaitopping WHERE topping.MaLoaiTP = loaitopping.MaLoaiTP AND MaTP = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function update($matp, $tentp) 
    {
        $qr = "UPDATE topping SET TenTP = $tentp WHERE topping.MaTP = '$matp'";        
        return mysqli_query($this->con, $qr);
    }

    public function delete($matp) {
        $qr = "DELETE FROM topping WHERE MaTP = '$matp'";
        return mysqli_query($this->con, $qr);
    }
}
?>