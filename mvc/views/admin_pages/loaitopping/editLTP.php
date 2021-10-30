<?php
    if(isset($_SESSION['ltp']['tenLTP'])) {
        $tenLTP = $_SESSION['ltp']['tenLTP'];
        unset($_SESSION['ltp']['tenLTP']);
    }
    else {
        $tenLTP = $data['ltp']['TenLoaiTP'];
    }
?>

<h3>CẬP NHẬT THÔNG TIN LOẠI TOPPING</h3>
<form action="LoaiTopping/Save/<?php echo $data['ltp']['MaLoaiTP'] ?>"  method="POST" enctype="multipart/form-data">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="maltp" class="control-label col-md-2"><b>Mã loại topping</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="maltp" name="maltp" readonly value="<?php echo $data['ltp']['MaLoaiTP']; ?>">
            </div>
        </div>

        <div class="form-group1">
            <label for="tenltp" class="control-label col-md-2"><b>Tên loại topping</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="tenltp" name="tenltp" value="<?php echo $tenLTP; ?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['tenLTP'])) {
                                                echo $_SESSION['error']['tenLTP'];   
                                                unset($_SESSION['error']['tenLTP']);
                                            } ?></span>
            </div>
        </div>

        <div class="form-group">
            <div style="margin-top: 10px;" class="col-md-offset-2 col-md-10">
                <input type="submit" name="them" value="Lưu" class="btn btn-primary" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <a class="btn btn-primary" href="LoaiDoUong/Index">Quay lại</a>
            </div>
        </div>
    </div>
</form>