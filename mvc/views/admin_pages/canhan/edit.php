<?php
    if(isset($_SESSION['nv']['tenNV'])) {
        $tenNV = $_SESSION['nv']['tenNV'];
        unset($_SESSION['nv']['tenNV']);
    }
    else {
        $tenNV = $data['nv']['tenNV'];
    }

    if(isset($_SESSION['nv']['gioiTinh'])) {
        $gioiTinh = $_SESSION['nv']['gioiTinh'];
        unset($_SESSION['nv']['gioiTinh']);
    }
    else {
        $gioiTinh = $data['nv']['gioiTinh'];
    }

    if(isset($_SESSION['nv']['ngaySinh'])) {
        $ngaySinh = $_SESSION['nv']['ngaySinh'];
        unset($_SESSION['nv']['ngaySinh']);
    }
    else {
        $ngaySinh = $data['nv']['ngaySinh'];
    }

    if(isset($_SESSION['nv']['diaChi'])) {
        $diaChi = $_SESSION['nv']['diaChi'];
        unset($_SESSION['nv']['diaChi']);
    }
    else {
        $diaChi = $data['nv']['diaChi'];
    }

    if(isset($_SESSION['nv']['soDienThoai'])) {
        $sdt = $_SESSION['nv']['soDienThoai'];
        unset($_SESSION['nv']['soDienThoai']);
    }
    else {
        $sdt = $data['nv']['sdt'];
    }

?>

<h3>CẬP NHẬT THÔNG TIN CÁ NHÂN</h3>
<form action="CaNhan/Save/<?php echo $data['nv']['maNV'] ?>"  method="POST" enctype="multipart/form-data">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="maNV" class="control-label col-md-2"><b>Mã nhân viên</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="maNV" name="maNV" readonly value="<?php echo $data['nv']['maNV']; ?>">
            </div>
        </div>

        <div class="form-group1">
            <label for="tenNV" class="control-label col-md-2"><b>Tên nhân viên</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="tenNV" name="tenNV" value="<?php echo $tenNV; ?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['tenNV'])) {
                                                echo $_SESSION['error']['tenNV'];   
                                                unset($_SESSION['error']['tenNV']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
            <label style="margin-left: 10px;padding-top:10px;" for="gioiTinh" class="control-label"><b>Giới tính</b></label>
            <input style="margin-left: 15px;" type="radio" name="gioiTinh" value="1" <?php if ($gioiTinh == '1') echo "checked"; ?>> Nam
            <input style="margin-left: 10px;" type="radio" name="gioiTinh" value="0" <?php if ($gioiTinh == '0') echo "checked"; ?>> Nữ
        </div>

        <div class="form-group1">
            <label for="ngaySinh" class="control-label col-md-2"><b>Ngày sinh</b></label>
            <div class="col-md-6">
                <input type="date" class="form-control text-box single-line" id="ngaySinh" name="ngaySinh" value="<?php echo $ngaySinh; ?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['ngaySinh'])) {
                                                echo $_SESSION['error']['ngaySinh'];   
                                                unset($_SESSION['error']['ngaySinh']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
            <label for="diaChi" class="control-label col-md-2"><b>Địa chỉ</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="diaChi" name="diaChi" value="<?php echo $diaChi; ?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['diaChi'])) {
                                                echo $_SESSION['error']['diaChi'];   
                                                unset($_SESSION['error']['diaChi']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
            <label for="email" class="control-label col-md-2"><b>Email</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="email" name="email" value="<?php echo $data['nv']['email']; ?>" readonly>
            </div>
        </div>

        <div class="form-group1">
            <label for="sdt" class="control-label col-md-2"><b>Số điện thoại</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="sdt" name="sdt" value="<?php echo $sdt; ?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['soDienThoai'])) {
                                                echo $_SESSION['error']['soDienThoai'];   
                                                unset($_SESSION['error']['soDienThoai']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
            <label for="hinhAnh" class="control-label col-md-2"><b>Ảnh nhân viên</b></label>
            <div class="col-md-6">
                <input type="FILE" accept="image/*" id="hinhAnh" name="hinhAnh">
            </div>
        </div>

        <div class="form-group">
            <div style="margin-top: 10px;" class="col-md-offset-2 col-md-10">
                <input type="submit" name="them" value="Lưu" class="btn btn-primary" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <a class="btn btn-primary" href="CaNhan/Index">Quay lại</a>
            </div>
        </div>
    </div>
</form>