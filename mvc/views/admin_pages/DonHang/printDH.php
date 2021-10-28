<style>
    #parentDiv {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 3rem;
        border-radius: 8px;
    }
</style>
<div id="parentDiv">
    <div style="text-align: center">
        <img src="public/images/logo1.png" width="250" />
        <br />
        63 Tô Hiến Thành, Nha Trang
        <br />
        Delivery: (0258) 3511212
    </div>
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
        </div>
    </div>
    <br />
    <h4>Danh sách đồ uống</h4>
    <hr />
    <div>
        <table class="table table-bordered table-hover customTable">
            <tr>
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
            $tongTatCa = 0;
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
                $tongTatCa += $tongTien;

                echo "
                    <tr>
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
    <center style="font-weight: bold">Thank you & see you again!!!</center>
</div>
<div style="display: flex; justify-content: space-around;">
    <div style="margin-top: 1.5rem;">
        <a id="printPDF" class="btn btn-primary">In hóa đơn</a>
    </div>
    <div style="margin-top: 1.5rem;">
        <a href="DonHang/Index" class="btn btn-light" style="background-color: #d7d8db;">Trở về</a>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="public/html2pdf.bundle.min.js?v=<?php echo time(); ?>"></script>

<script>
    $("#printPDF").click(function() {
        var element = document.getElementById('parentDiv');
        html2pdf().from(element).set({
            margin: [30, 10, 5, 10],
            pagebreak: {
                avoid: 'tr'
            },
            filename: <?php echo $data['ttkh']['MaHD']; ?> + '.pdf',
            jsPDF: {
                orientation: 'landscape',
                unit: 'pt',
                format: 'letter',
                compressPDF: true
            }
        }).save()
    });
</script>