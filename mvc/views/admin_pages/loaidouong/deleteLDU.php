<div>
    <h1 class="text-center">Bạn chắc chắn muốn xóa loại đồ uống này ?</h1>
    <div class="form-horizontal" style="display:flex; justify-content:center">
        <div style=" margin-left: 10px; width: 350px;">
            <label class="form-control">Mã loại đồ uống: <?php echo $data['ldu']['MaLoaiDU'] ?> </label>
            <label class="form-control">Tên loại đồ uống: <?php echo $data['ldu']['TenLoaiDU'] ?> </label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-6">
            <button class="btn btn-primary">
                <a style="color:aliceblue " href="#">
                    Xóa
                </a>
            </button>
            <button class="comeback">
                <a href="javascript:window.history.back(-1);">Quay lại</a>
            </button>
        </div>
    </div>
</div>