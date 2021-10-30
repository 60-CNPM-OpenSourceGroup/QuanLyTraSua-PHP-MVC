<h3>THÊM MỚI LOẠI TOPPING</h3>

<form action="LoaiTopping/Store" method="post">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="maltp" class="control-label col-md-4"><b>Mã loại topping</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="maltp" name="maltp"
                value="<?php if(isset($_SESSION['ltp']['maLTP'])) echo $_SESSION['ltp']['maLTP']; unset($_SESSION['ltp']['maLTP']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['maLTP'])) {
                                                echo $_SESSION['error']['maLTP'];
                                                unset($_SESSION['error']['maLTP']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group1">
            <label for="tenltp" class="control-label col-md-4"><b>Tên loại đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="tenltp" name="tenltp"
                value="<?php if(isset($_SESSION['ltp']['tenLTP'])) echo $_SESSION['ltp']['tenLTP']; unset($_SESSION['ltp']['tenLTP']);?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['tenLTP'])) {
                                                echo $_SESSION['error']['tenLTP'];
                                                unset($_SESSION['error']['tenLTP']); // tạm tạm rồi, làm vài phát nữa :v, làm
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