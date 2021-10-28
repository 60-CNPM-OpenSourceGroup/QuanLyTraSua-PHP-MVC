<style>
    .customTable {
        border-collapse: collapse;
        width: 100%;
    }

    .customTable td,
    #customTable th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .customTable tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .customTable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: cyan;
    }

    .details {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 26px;
        border-radius: 8px;
    }
</style>

<div class="details">
    <h3 style="text-align: center;">CHI TIẾT ĐƠN ĐẶT HÀNG</h3>
    <h4 style="text-align: center;">Thông tin đơn đặt hàng</h4>
    <hr />
    <div style="margin-left: 150px;">

        <div class="row">
            <div class="col-md-6"><b>Số HĐ: </b><?php echo $data['ttkh']['MaHD']; ?> <?php  ?></div>
            <?php $date = str_replace('-', '/', $data['ttkh']['NgayLap']); ?>
            <div class="col-md-6"><b>Ngày mua: </b> <?php echo date('d/m/Y', strtotime($date)); ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><b>Họ tên: </b> <?php echo $data['ttkh']['HoTen'] ?></div>
            <div class="col-md-6"><b>Số điện thoại: </b> <?php echo $data['ttkh']['Sdt'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><b>Địa chỉ: </b> <?php echo $data['ttkh']['DiaChi'] ?></div>
            <div class="col-md-6"><b>Ghi chú: </b> <?php echo $data['ttkh']['GhiChu'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-6"><b>Nhân viên giao hàng:</b>
                <?php

                $s = "";
                if ($data['ttkh']['MaNV'] == NULL) {
                    echo $s = "Chưa có";
                } else {
                    foreach ($data['shipper'] as $s) {
                        if ($s['maNV'] == $data['ttkh']['MaNV']) {
                            echo $s['tenNV'];
                        }
                    }
                }

                ?>
            </div>
            <div class="col-md-6">
                <b>Tình trạng đơn:</b>
                <?php
                $tt = ($data['ttkh']['TinhTrang'] == 0) ? 'Đơn hủy' : (($data['ttkh']['TinhTrang'] == 1) ? 'Đơn chưa kiểm' : 'Đã giao');
                echo $tt;
                ?>
            </div>
        </div>
    </div>
    <br />
    <h4>Danh sách đồ uống</h4>
    <hr />
    <div>
        <table class="table table-bordered table-hover customTable">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên đồ uống</th>
                <th>Số lượng</th>
                <th>Kích cỡ</th>
                <th>% Đá</th>
                <th>% Đường</th>
                <th>Topping</th>
                <th>Tiền trà sữa</th>
                <th>Tiền topping</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            // $tongTatCa = 0;
            $tongTien = 0;
            $tongSL = 0;
            $TienTP = 0;
            $str = "";
            $Sl = "";
            // echo $tb;
            foreach ($data['cthd'] as $cthd) {
                $tongSL += $cthd['SoLuong'];
                $tongTienTP = 0;
                $tienTS = 0;

                if ($cthd['Size'] == "M") {
                    // if ($cthd['DonGia'])
                    $tienTS = $cthd['DonGia'];
                } else {
                    // if ($cthd['DonGia'])
                    $tienTS = $cthd['DonGia'] + 5000;
                }

                foreach ($data['cttp'] as $cttp) {
                    // print_r($cttp);
                    $TienTP = $cttp['DonGia'];
                    $Sl = $cthd['SoLuong'];
                    $tongTienTP += $Sl * $TienTP;
                    $str = $cttp['TenTP'];
                }

                $tongTien += $tienTS * $cthd['SoLuong'] + $tongTienTP;
                // $tongTatCa += $tongTien;

                echo "
                    <tr>
                        <td><img height='100' width='100' src='public/upload/douong/" . $cthd['HinhAnh'] . "' /></td>
                        <td>" . $cthd['TenDU'] . "</td>
                        <td>" . $cthd['SoLuong'] . "</td>
                        <td>" . $cthd['Size'] . "</td>
                        <td>" . $cthd['PhanTramDa'] . "</td>
                        <td>" . $cthd['PhanTramDuong'] . "</td>
                        <td>" . $str . "</td>
                        <td>" . $cthd['SoLuong'] . " x " . $tienTS . "</td>
                        <td>" . $Sl . " x " . $TienTP . "</td>
                        <td>" . $tienTS . "</td>
                    </tr>
                    ";
                //    
            }
            ?>
        </table>
    </div>
    <hr />
    <div style="text-align:right;">
        <p>Tổng tiền: <?php echo $tongTien ?></p>
    </div>
</div>
<div style="margin-top: 1.5rem;">
    <a href="DonHang/Index" class="btn btn-primary">Trở về</a>
</div>