<div class="checkform">
    <div class="content">
        <h3 style="margin-left: 15px;">Bạn chắc chắn muốn xóa phân quyền này ?</h3>
        <form action="PhanQuyen/Confirm/<?php echo $data['pq']['IDNhom'] ?>/<?php echo $data['pq']['IDQuyen'] ?>" method="post">
            <div class="form-horizontal" style="display:flex; margin-left: 15px;">
                <div style="width: 350px;">
                    <label class="form-control">Nhóm nhân viên: <?php echo $data['pq']['TenNhom'] ?> </label>
                    <label class="form-control">Quyền: <?php echo $data['pq']['TenQuyen'] ?> </label>
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