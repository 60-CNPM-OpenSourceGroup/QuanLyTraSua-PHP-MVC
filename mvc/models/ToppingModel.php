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
        if ($_FILES["hinh"]['name'] != NULL) {
            $anhtp = $_FILES["hinh"]['name'];
            move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/topping/" . $_FILES["hinh"]["name"]);
            
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
        $qr = "SELECT * FROM topping where TenTP like '%$tukhoa%' ";
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