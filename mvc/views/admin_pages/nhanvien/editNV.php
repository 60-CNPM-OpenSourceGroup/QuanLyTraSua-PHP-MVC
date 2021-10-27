<h3>CẬP NHẬT THÔNG TIN NHÂN VIÊN</h3>
<form action="NhanVien/Save/<?php echo $data['nv']['maNV'] ?>"  method="POST" enctype="multipart/form-data">
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
                <input required="true" type="text" class="form-control text-box single-line" id="tenNV" name="tenNV" value="<?php echo $data['nv']['tenNV']; ?>">
            </div>
        </div>

        <div class="form-group1">
            <label style="margin-left: 10px;padding-top:10px;" for="gioiTinh" class="control-label"><b>Giới tính</b></label>
            <input style="margin-left: 15px;" type="radio" name="gioiTinh" value="1" <?php if ($data['nv']['gioiTinh'] == '1') echo "checked"; ?>> Nam
            <input style="margin-left: 10px;" type="radio" name="gioiTinh" value="0" <?php if ($data['nv']['gioiTinh'] == '0') echo "checked"; ?>> Nữ
        </div>

        <div class="form-group1">
            <label for="ngaySinh" class="control-label col-md-2"><b>Ngày sinh</b></label>
            <div class="col-md-6">
                <input required="true" type="date" class="form-control text-box single-line" id="ngaySinh" name="ngaySinh" value="<?php echo $data['nv']['ngaySinh']; ?>">
            </div>
        </div>

        <div class="form-group1">
            <label for="diaChi" class="control-label col-md-2"><b>Địa chỉ</b></label>
            <div class="col-md-6">
                <input required="true" type="text" class="form-control text-box single-line" id="diaChi" name="diaChi" value="<?php echo $data['nv']['diaChi']; ?>">
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
                <input type="text" class="form-control text-box single-line" id="sdt" name="sdt" value="<?php echo $data['nv']['sdt']; ?>" required>
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
                <a class="btn btn-primary" href="javascript:window.history.back(-1);">Quay lại</a>
            </div>
        </div>
    </div>
</form>