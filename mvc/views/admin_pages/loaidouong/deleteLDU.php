<div class="checkform">
    <div class="content">
        <h3 class="text-center">Bạn chắc chắn muốn xóa loại đồ uống này ?</h3>
        <form action="LoaiDoUong/Confirm/<?php echo $data['ldu']['MaLoaiDU'] ?>" method="post">
            <div class="form-horizontal" style="display:flex; justify-content:center">
                <div style=" margin-left: 10px; width: 350px;">
                    <label class="form-control">Mã loại đồ uống: <?php echo $data['ldu']['MaLoaiDU'] ?> </label>
                    <label class="form-control">Tên loại đồ uống: <?php echo $data['ldu']['TenLoaiDU'] ?> </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-6">
                    <input type="submit" value="Xóa" class="btn btn-primary" />
                </div>
                <div class="col-md-offset-2 col-md-6">
                    <button class="comeback">
                        <a href="javascript:window.history.back(-1);">Quay lại</a>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>