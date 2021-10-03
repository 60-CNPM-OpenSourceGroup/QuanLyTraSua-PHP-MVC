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
        $qr = "SELECT * FROM topping WHERE MaTP = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
?>