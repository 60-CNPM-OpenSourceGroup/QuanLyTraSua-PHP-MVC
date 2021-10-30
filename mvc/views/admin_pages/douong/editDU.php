<?php
    if(isset($_SESSION['du']['tenDU'])) {
        $tenDU = $_SESSION['du']['tenDU'];
        unset($_SESSION['du']['tenDU']);
    }
    else {
        $tenDU = $data['du']['TenDU'];
    }

    if(isset($_SESSION['du']['donGia'])) {
        $donGia = $_SESSION['du']['donGia'];
        unset($_SESSION['du']['donGia']);
    }
    else {
        $donGia = $data['du']['DonGia'];
    }

    if(isset($_SESSION['du']['ngayThem'])) {
        $ngayThem = $_SESSION['du']['ngayThem'];
        unset($_SESSION['du']['ngayThem']);
    }
    else {
        $ngayThem = $data['du']['NgayThem'];
    }
	$date = date_create($ngayThem);
	$ngayThem = date_format($date,"Y-m-d");

    if(isset($_SESSION['du']['banChay'])) {
        $banChay = $_SESSION['du']['banChay'];
        unset($_SESSION['du']['banChay']);
    }
    else {
        $banChay = $data['du']['BanChay'];
    }

    if(isset($_SESSION['du']['ldu'])) {
        $maLDU = $_SESSION['du']['ldu']; 
        unset($_SESSION['du']['ldu']);
    }
    else {
        $maLDU = $data['du']['MaLoaiDU'];
    }

?>

<h3>CẬP NHẬT THÔNG TIN ĐỒ UỐNG</h3>
<form action="DoUong/Save/<?php echo $data['du']['MaDU'] ?>"  method="POST" enctype="multipart/form-data">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="madu" class="control-label col-md-2"><b>Mã đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="madu" name="madu" readonly value="<?php echo $data['du']['MaDU']; ?>">
            </div>
        </div>

        <div class="form-group1">
            <label for="tendu" class="control-label col-md-2"><b>Tên đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="tendu" name="tendu" value="<?php echo $tenDU; ?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['tenDU'])) {
                                                echo $_SESSION['error']['tenDU'];   
                                                unset($_SESSION['error']['tenDU']);
                                            } ?></span>
            </div>
        </div>

		<div class="form-group1">
            <label for="dongia" class="control-label col-md-2"><b>Giá</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="dongia" name="dongia" value="<?php echo $donGia;?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['donGia'])) {
                                                echo $_SESSION['error']['donGia'];   
                                                unset($_SESSION['error']['donGia']);
                                            } ?></span>
            </div>
        </div>	

        <div class="form-group1">
            <label for="hinh" class="control-label col-md-2"><b>Ảnh đồ uống</b></label>
            <div class="col-md-6">
                <input type="FILE" accept="image/*" id="hinh" name="hinh">
            </div>
        </div>

        <div class="form-group1">
            <label for="ngaythem" class="control-label col-md-2"><b>Ngày thêm</b></label>
            <div class="col-md-6">
                <input type="date" class="form-control text-box single-line" id="ngaythem" name="ngaythem" value="<?php echo $ngayThem; ?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['ngayThem'])) {
                                                echo $_SESSION['error']['ngayThem'];   
                                                unset($_SESSION['error']['ngayThem']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
		<label style="margin-left: 10px;padding-top:10px;" for="banchay" class="control-label"><b>Bán chạy</b></label>
            <input style="margin-left: 10px;" type="checkbox" name="banchay" value="1" <?php if ($banChay == '1') echo "checked";else echo ""; ?>>
        </div>

        <div class="form-group1">
            <label for="loaiDU" class="control-label col-md-2"><b>Loại đồ uống</b></label>
            <div class="col-md-6">
                <select name="loaiDU" class="form-control text-box single-line">
                    <?php
                    foreach ($data['listTenLoaiDU'] as $loaiDU) {
                        if ($loaiDU['MaLoaiDU'] == $maLDU) {
                            $s = "selected";
                            unset( $_SESSION['du']['ldu']);
                        } else {
                            $s = "";
                        }
                        echo '<option ' . $s . ' value="' . $loaiDU['MaLoaiDU'] . '" class = "form-control">' . $loaiDU['TenLoaiDU'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div style="margin-top: 10px;" class="col-md-offset-2 col-md-10">
                <input type="submit" name="them" value="Lưu" class="btn btn-primary" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <a class="btn btn-primary" href="DoUong/Index">Quay lại</a>
            </div>
        </div>
    </div>
</form>