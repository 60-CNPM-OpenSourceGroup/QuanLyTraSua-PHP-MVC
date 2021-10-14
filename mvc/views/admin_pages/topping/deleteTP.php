<div>
    <h1 class="text-center">Bạn chắc chắn muốn xóa topping này ?</h1>
    <div class="form-horizontal" style="display:flex; justify-content:center">
        <?php
        echo '<img style="width: 250px; height: 270px; align-self: center; display: flex;" src="public/upload/topping/' . $data['tp']['HinhAnh'] . '" />';
        ?>
        <div style=" margin-left: 10px; width: 350px;">
            <label class="form-control">Mã topping: <?php echo $data['tp']['MaTP'] ?> </label>
            <label class="form-control">Tên topping: <?php echo $data['tp']['TenTP'] ?> </label>

            <label class="form-control" for="">Đơn giá: <?php echo $data['tp']['DonGia'] ?></label>
            
            <label class="form-control" for="">Loại topping:<?php
                                                            foreach ($data['listTenLoaiTP'] as $loaiTP) {
                                                                if ($data["tp"]["MaLoaiTP"] == $loaiTP['MaLoaiTP']) {
                                                                    echo $loaiTP['TenLoaiTP'];
                                                                }
                                                            } ?> </label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-6">
            <button class="btn btn-primary">
                <a style="color:aliceblue " href="Topping/Confirm/<?php echo $data['tp']['MaTP'] ?>">
                    Xóa
                </a>
            </button>
            <button class="comeback">
                <a href="javascript:window.history.back(-1);">Quay lại</a>
            </button>
        </div>
    </div>
</div>