<div>
    <h1 class="text-center">Bạn chắc chắn muốn xóa loại Topping này ?</h1>
    <div class="form-horizontal" style="display:flex; justify-content:center">
        <div style=" margin-left: 10px; width: 350px;">
            <label class="form-control">Mã loại topping: <?php echo $data['ltp']['MaLoaiTP'] ?> </label>
            <label class="form-control">Tên loại topping: <?php echo $data['ltp']['TenLoaiTP'] ?> </label>
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