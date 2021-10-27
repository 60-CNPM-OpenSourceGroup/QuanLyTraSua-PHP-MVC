<div class="checkform">
    <div class="content">
        <h3 style="margin-left: 15px;">Bạn chắc chắn muốn xóa nhóm nhân viên này ?</h3>
        <form action="NhomNhanVien/Confirm/<?php echo $data['nnv']['IDNhom'] ?>" method="post">
            <div class="form-horizontal" style="display:flex; margin-left: 15px;">
                <div style="width: 350px;">
                    <label class="form-control">Mã nhóm nhân viên: <?php echo $data['nnv']['IDNhom'] ?> </label>
                    <label class="form-control">Tên nhóm nhân viên: <?php echo $data['nnv']['TenNhom'] ?> </label>
                </div>
            </div>
            <div class="form-group">
                <div style="margin-top: 10px;" class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Xóa" class="btn btn-primary" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <a class="btn btn-primary" href="javascript:window.history.back(-1);">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
</div>