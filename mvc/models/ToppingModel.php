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

    public function update($matp, $tentp, $dongia, $anhtp, $loaiTP)
    {
        if($anhtp != null){
            $qr = "UPDATE topping SET TenTP = '$tentp', DonGia = '$dongia', HinhAnh ='$anhtp', MaLoaiTP = '$loaiTP' WHERE MaTP = '$matp'";
        } else {
            $qr = "UPDATE topping SET TenTP = '$tentp', DonGia = '$dongia', MaLoaiTP = '$loaiTP' WHERE MaTP = '$matp'";
        }       
        return mysqli_query($this->con, $qr);
    }

    public function delete($matp) {
        $qr = "DELETE FROM topping WHERE MaTP = '$matp'";
        return mysqli_query($this->con, $qr);
    }

    public function TimKiemTP($tukhoa){
        $qr = "select * from topping left join loaitopping on topping.MaLoaiTP = loaitopping.MaLoaiTP 
                where 1 and TenTP like '%$tukhoa%' or MaTP like '%$tukhoa%' 
                or DonGia like '%$tukhoa%' or TenLoaiTP like '%$tukhoa%'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($matp, $tentp, $dongia, $anhtp, $loaiTP)
    {
        $qr = "INSERT INTO topping VALUES ('" . $matp . "', '" . $tentp . "','" . $dongia . "', '" . $anhtp . "', '" . $loaiTP . "')";
        return mysqli_query($this->con, $qr);
    }
}
?>