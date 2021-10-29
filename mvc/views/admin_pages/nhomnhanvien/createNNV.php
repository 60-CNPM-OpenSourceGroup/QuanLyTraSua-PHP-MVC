<h3>THÊM MỚI NHÓM NHÂN VIÊN</h3>

<form action="NhomNhanVien/Store" method="post">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="idNhom" class="control-label col-md-4"><b>Mã nhóm nhân viên</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="idNhom" name="idNhom"
                value="<?php if(isset($_SESSION['nnv']['maNNV'])) echo $_SESSION['nnv']['maNNV']; unset($_SESSION['nnv']['maNNV']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['maNNV'])) {
                                                echo $_SESSION['error']['maNNV'];
                                                unset($_SESSION['error']['maNNV']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
            <label for="tenNhom" class="control-label col-md-4"><b>Tên nhóm nhân viên</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="tenNhom" name="tenNhom"
                value="<?php if(isset($_SESSION['nnv']['tenNNV'])) echo $_SESSION['nnv']['tenNNV']; unset($_SESSION['nnv']['tenNNV']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['tenNNV'])) {
                                                echo $_SESSION['error']['tenNNV'];
                                                unset($_SESSION['error']['tenNNV']); // tạm tạm rồi, làm vài phát nữa :v, làm
                                            } ?></span>
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