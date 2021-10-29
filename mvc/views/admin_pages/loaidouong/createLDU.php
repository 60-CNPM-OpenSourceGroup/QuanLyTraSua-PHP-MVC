<h3>THÊM MỚI LOẠI ĐỒ UỐNG</h3>

<form action="LoaiDoUong/Store" method="post">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="maldu" class="control-label col-md-4"><b>Mã loại đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="maldu" name="maldu"
                value="<?php if(isset($_SESSION['ldu']['maLDU'])) echo $_SESSION['ldu']['maLDU']; unset($_SESSION['ldu']['maLDU']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['maLDU'])) {
                                                echo $_SESSION['error']['maLDU'];
                                                unset($_SESSION['error']['maLDU']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
            <label for="tenldu" class="control-label col-md-4"><b>Tên loại đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="tenldu" name="tenldu"
                value="<?php if(isset($_SESSION['ldu']['tenLDU'])) echo $_SESSION['ldu']['tenLDU']; unset($_SESSION['ldu']['tenLDU']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['tenLDU'])) {
                                                echo $_SESSION['error']['tenLDU'];
                                                unset($_SESSION['error']['tenLDU']); // tạm tạm rồi, làm vài phát nữa :v, làm
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