<?php
class DoUongModel extends DataBase
{

    public function listAll()
    {
        $qr = "SELECT * FROM douong";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function getDoUongById($id)
    {
        $qr = "SELECT * FROM douong,loaidouong WHERE douong.MaLoaiDU = loaidouong.MaLoaiDU AND MaDU = '$id'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

    public function insert($madu, $tendu, $dongia, $anhdu, $ngaythem, $banchay, $loaiDU)
    {
        $qr = "INSERT INTO douong VALUES ('" . $madu . "', '" . $tendu . "','" . $dongia . "', '" . $anhdu . "', '" . $ngaythem . "','" . $banchay . "', '" . $loaiDU . "')";
        return mysqli_query($this->con, $qr);
    }

    public function update($madu, $tendu, $dongia, $anhdu, $ngaythem, $banchay, $loaiDU)
    {
        if ($_FILES["hinh"]['name'] != NULL) {
            $anhdu = $_FILES["hinh"]['name'];
            move_uploaded_file($_FILES["hinh"]["tmp_name"], "public/upload/douong/" . $_FILES["hinh"]["name"]);

            $qr = "UPDATE douong SET TenDU = '$tendu', DonGia = '$dongia', HinhAnh ='$anhdu', 
            NgayThem = '$ngaythem', BanCHay  = '$banchay', MaLoaiDU = '$loaiDU' WHERE MaDU = '$madu'";
        } else {
            $qr = "UPDATE douong SET TenDU = '$tendu', DonGia = '$dongia', 
            NgayThem = '$ngaythem', BanCHay  = '$banchay', MaLoaiDU = '$loaiDU' WHERE MaDU = '$madu'";
        }

        return mysqli_query($this->con, $qr);
    }

    public function delete($madu)
    {
        $qr = "DELETE FROM douong WHERE MaDU = '$madu'";
        return mysqli_query($this->con, $qr);
    }

    public function TimKiemDU($tukhoa)
    {
        $qr = "select * from douong left join loaidouong on douong.MaLoaiDU = loaidouong.MaLoaiDU 
				where 1 and TenDU like '%$tukhoa%' or MaDU like '%$tukhoa%' 
                or DonGia like '%$tukhoa%' or TenLoaiDU like '%$tukhoa%'";
        $rows = mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }
}
