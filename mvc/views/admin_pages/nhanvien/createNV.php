<h3>THÊM MỚI NHÂN VIÊN</h3>
<form action="NhanVien/Store" method="post" enctype="multipart/form-data">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="manv" class="control-label col-md-2"><b>Mã nhân viên</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="manv" name="manv" readonly value="<?php echo $data['manv'] ?>">
            </div>
        </div>

        <div class="form-group1">
            <label for="tennv" class="control-label col-md-2"><b>Tên nhân viên</b></label>
            <div class="col-md-6">
                <input required="true" type="text" class="form-control text-box single-line" id="tennv" name="tennv">
            </div>
        </div>

        <div class="form-group1">
            <label style="margin-left: 10px;padding-top:10px;" for="gioitinh" class="control-label"><b>Giới tính</b></label>
            <input style="margin-left: 15px;" type="radio" name="gioitinh" value="1" checked> Nam
            <input style="margin-left: 10px;" type="radio" name="gioitinh" value="0"> Nữ
        </div>

        <div class="form-group1">
            <label for="ngaysinh" class="control-label col-md-2"><b>Ngày sinh</b></label>
            <div class="col-md-6">
                <input required="true" type="date" class="form-control text-box single-line" id="ngaysinh" name="ngaysinh" value="<?php echo $ngaysinh ?>">
            </div>
        </div>

        <div class="form-group1">
            <label for="diachi" class="control-label col-md-2"><b>Địa chỉ</b></label>
            <div class="col-md-6">
                <input required="true" type="text" class="form-control text-box single-line" id="diachi" name="diachi">
            </div>
        </div>

        <div class="form-group1">
            <label for="email" class="control-label col-md-2"><b>Email</b></label>
            <div class="col-md-6">
                <input required="true" type="text" class="form-control text-box single-line" id="email" name="email">
            </div>
        </div>

        <div class="form-group1">
            <label for="password" class="control-label col-md-2"><b>Mật khẩu</b></label>
            <div class="col-md-6">
                <input required="true" type="text" class="form-control text-box single-line" id="password" name="password">
            </div>
        </div>

        <div class="form-group1">
            <label for="sdt" class="control-label col-md-2"><b>Số điện thoại</b></label>
            <div class="col-md-6">
                <input required="true" type="text" class="form-control text-box single-line" id="sdt" name="sdt">
            </div>
        </div>

        <div class="form-group1">
            <label for="hinhanh" class="control-label col-md-2"><b>Ảnh nhân viên</b></label>
            <div class="col-md-6">
                <input required="true" type="FILE" id="hinhanh" name="hinhanh">
            </div>
        </div>

        <div class="form-group1">
            <label for="nhomNV" class="control-label col-md-2"><b>Nhóm nhân viên</b></label>
            <div class="col-md-6">
                <select name="nhomNV" class="form-control text-box single-line">
                    <?php
                    foreach ($data['listTenNhomNV'] as $nhomNV) {
                        if ($data["nv"]["IDNhom"] == $nhomNV['IDNhom']) {
                            $s = "selected";
                        } else {
                            $s = "";
                        }
                        echo '<option ' . $s . ' value="' . $nhomNV['IDNhom'] . '" class = "form-control">' . $nhomNV['TenNhom'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div style="margin-top: 10px;" class="col-md-offset-2 col-md-10">
                <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <a class="btn btn-primary" href="javascript:window.history.back(-1);">Quay lại</a>
            </div>
        </div>
    </div>
</form>