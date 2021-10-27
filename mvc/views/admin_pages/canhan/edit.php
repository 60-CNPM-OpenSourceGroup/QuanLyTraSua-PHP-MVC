<h3>CẬP NHẬT THÔNG TIN CÁ NHÂN</h3>

<div class="mt-3">
    <form action="canhan/save" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="mb-3 col-md-12">
                <label for="maNV" class="form-label"><b>Mã nhân viên</b></label>
                <input type="text" class="form-control w-50" id="maNV" name="maNV" readonly value="<?php echo $data['nv']['maNV']; ?>">
            </div>
            <div class="mb-3 col-md-12">
                <label for="tenNV" class="form-label"><b>Tên nhân viên</b></label>
                <input type="text" class="form-control w-50" id="tenNV" name="tenNV" value="<?php echo $data['nv']['tenNV']; ?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label for="gioiTinh" class="form-label"><b>Giới tính</b></label><br>
                <input type="radio" name="gioiTinh" value="1" <?php if ($data['nv']['gioiTinh'] == '1') echo "checked"; ?>> Nam
                <input type="radio" name="gioiTinh" value="0" <?php if ($data['nv']['gioiTinh'] == '0') echo "checked"; ?>> Nữ
            </div>
            <div class="mb-3 col-md-12">
                <label for="ngaySinh" class="form-label"><b>Ngày sinh</b></label>
                <input type="date" class="form-control w-50" id="ngaySinh" name="ngaySinh" value="<?php echo $data['nv']['ngaySinh']; ?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label for="diaChi" class="form-label"><b>Địa chỉ</b></label>
                <input type="text" class="form-control w-50" id="diaChi" name="diaChi" value="<?php echo $data['nv']['diaChi']; ?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="text" class="form-control w-50" id="email" name="email" value="<?php echo $data['nv']['email']; ?>" readonly>
            </div>
            <div class="mb-3 col-md-12">
                <label for="sdt" class="form-label"><b>Số điện thoại</b></label>
                <input type="text" class="form-control w-50" id="sdt" name="sdt" value="<?php echo $data['nv']['sdt']; ?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label for="hinhAnh" class="form-label"><b>Hình ảnh</b></label>
                <input type="file" class="form-control w-50" accept="image/*" id="hinhAnh" name="hinhAnh">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>