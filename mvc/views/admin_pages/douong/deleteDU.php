<div class="checkform">
    <div class="content">
        <h3 class="text-center">Bạn chắc chắn muốn xóa đồ uống này ?</h3>
        <form action="DoUong/Confirm/<?php echo $data['du']['MaDU'] ?>" method="post">
            <div class="form-horizontal" style="display:flex; justify-content:center">
                <?php
                echo '<img style="width: 250px; height: 270px; align-self: center; display: flex;" src="public/upload/douong/' . $data['du']['HinhAnh'] . '" />';
                ?>
                <div style=" margin-left: 10px; width: 350px;">
                    <label class="form-control">Mã đồ uống: <?php echo $data['du']['MaDU'] ?> </label>
                    <label class="form-control">Tên đồ uống: <?php echo $data['du']['TenDU'] ?> </label>
                    <label class="form-control" for="">Đơn giá: <?php echo $data['du']['DonGia'] ?></label>
                    <label class="form-control">Ngày thêm:
                        <?php
                        $date = str_replace('-', '/', $data['du']["NgayThem"]);
                        echo date('d/m/Y', strtotime($date));
                        ?>
                    </label>
                    <label class="form-control" for="">Bán chạy:
                        <?php
                        if ($data['du']["BanChay"] == 1)
                            echo "Có";
                        else
                            echo "Không";

                        ?> </label>
                    <label class="form-control" for="">Loại đồ uống:<?php
                                                                    foreach ($data['listTenLoaiDU'] as $loaiDU) {
                                                                        if ($data["du"]["MaLoaiDU"] == $loaiDU['MaLoaiDU']) {
                                                                            echo $loaiDU['TenLoaiDU'];
                                                                        }
                                                                    } ?> </label>
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