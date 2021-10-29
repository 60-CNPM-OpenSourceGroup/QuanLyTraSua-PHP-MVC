<h3>THÊM MỚI ĐỒ UỐNG</h3>
<form action="DoUong/Store" method="post" enctype="multipart/form-data">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="madu" class="control-label col-md-2"><b>Mã đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="madu" name="madu" readonly value="<?php echo $data['madu'] ?>">
            </div>
        </div>

        <div class="form-group1">
            <label for="tendu" class="control-label col-md-2"><b>Tên đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="tendu" name="tendu"
                value="<?php if(isset($_SESSION['du']['tenDU'])) echo $_SESSION['du']['tenDU']; unset($_SESSION['du']['tenDU']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['tenDU'])) {
                                                echo $_SESSION['error']['tenDU'];   
                                                unset($_SESSION['error']['tenDU']);
                                            } ?></span>
            </div>
        </div>

		<div class="form-group1">
            <label for="dongia" class="control-label col-md-2"><b>Giá</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="dongia" name="dongia"
                value="<?php if(isset($_SESSION['du']['donGia'])) echo $_SESSION['du']['donGia']; unset($_SESSION['du']['donGia']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['donGia'])) {
                                                echo $_SESSION['error']['donGia'];   
                                                unset($_SESSION['error']['donGia']);
                                            } ?></span>
            </div>
        </div>	
		
		<div class="form-group1">
            <label for="hinh" class="control-label col-md-2"><b>Ảnh đồ uống</b></label>
            <div class="col-md-6">
                <input type="FILE" id="hinh" name="hinh">
                <br>
                <span class="text-danger"><?php if (isset($_SESSION['error']['anhDU'])) {
                                                echo $_SESSION['error']['anhDU'];   
                                                unset($_SESSION['error']['anhDU']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
            <label for="ngaythem" class="control-label col-md-2"><b>Ngày thêm</b></label>
            <div class="col-md-6">
                <input type="date" class="form-control text-box single-line" id="ngaythem" name="ngaythem"
                value="<?php if(isset($_SESSION['du']['ngayThem'])) echo $_SESSION['du']['ngayThem']; unset($_SESSION['du']['ngayThem']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['ngayThem'])) {
                                                echo $_SESSION['error']['ngayThem'];   
                                                unset($_SESSION['error']['ngayThem']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
		<label style="margin-left: 10px;padding-top:10px;" for="banchay" class="control-label"><b>Bán chạy</b></label>
            <input style="margin-left: 10px;" type="checkbox" name="banchay" value="1" <?php if(isset($_SESSION['du']['banChay']) && $_SESSION['du']['banChay'] == '1') echo "checked";else echo ""; unset($_SESSION['du']['banChay']);?>>
        </div>

        <div class="form-group1">
            <label for="loaiDU" class="control-label col-md-2"><b>Loại đồ uống</b></label>
            <div class="col-md-6">
                <select name="loaiDU" class="form-control text-box single-line">
                    <?php
                    foreach ($data['listTenLoaiDU'] as $loaiDU) {
                        if ($loaiDU['MaLoaiDU'] == $_SESSION['du']['ldu']) {
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
                <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <a class="btn btn-primary" href="douong/index">Quay lại</a>
            </div>
        </div>
    </div>
</form>