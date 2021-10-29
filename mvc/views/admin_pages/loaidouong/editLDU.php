<?php
    if(isset($_SESSION['ldu']['tenLDU'])) {
        $tenLDU = $_SESSION['ldu']['tenLDU'];
        unset($_SESSION['ldu']['tenLDU']);
    }
    else {
        $tenLDU = $data['ldu']['TenLoaiDU'];
    }
?>

<h3>CẬP NHẬT THÔNG TIN LOẠI ĐỒ UỐNG</h3>
<form action="LoaiDoUong/Save/<?php echo $data['ldu']['MaLoaiDU'] ?>"  method="POST" enctype="multipart/form-data">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="maldu" class="control-label col-md-2"><b>Mã loại đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="maldu" name="maldu" readonly value="<?php echo $data['ldu']['MaLoaiDU']; ?>">
            </div>
        </div>

        <div class="form-group1">
            <label for="tenldu" class="control-label col-md-2"><b>Tên loại đồ uống</b></label>
            <div class="col-md-6">
                <input type="text" class="form-control text-box single-line" id="tenldu" name="tenldu" value="<?php echo $tenLDU; ?>">
                <span class="text-danger"><?php if (isset($_SESSION['error']['tenLDU'])) {
                                                echo $_SESSION['error']['tenLDU'];   
                                                unset($_SESSION['error']['tenLDU']);
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