<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 95%;
        margin: 20px;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        font-size: 15px;
    }
    td {
        font-weight: 500;
    }
    th {
        background-color: #116333;
    }
</style>
<section id="menu">
<div style="margin-top:100px; margin-bottom: 32px;">
    <h2 style="margin-left: 20px"><strong>GIỎ HÀNG CỦA BẠN</strong></h2>
    <hr />

    <?php 
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
        {
            
            $tongTien = 0;
            $tongTatCa = 0;
            $tongSL = 0;
            echo '<table>
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
                    <th></th>
                </tr>';
                foreach($_SESSION['cart'] as $item)
                {
                    $tongSL += $item['soluong'];
                    $tongTienTP = 0;
                    $tienTS = 0;
                    if ($item['size'] == "M")
                    {
                        $tienTS = $item['doUong']['DonGia'];
                    }
                    else
                    {
                        $tienTS = $item['dongia'] + 5000;
                    }
    
                    if (isset($item['listTP']) && count($item['listTP']) > 0)
                    {
                        foreach ($item['listTP'] as $tp)
                        {
                            $tongTienTP += $tp['DonGia'];
                        }
                    }
    
                    $tongTien = $tienTS * $item['soluong'] + $tongTienTP * $item['soluong'];
                    $tongTatCa += $tongTien;
    
                    echo '<tr>
                        <td><img height="100px" width="100px" src="public/upload/douong/'.$item['doUong']['HinhAnh'].'" /></td>';
                        echo '<td>'.$item['doUong']['TenDU'].'</td>';
                        echo '<td>'.$item['soluong'].'</td>';
                        echo '<td>'.$item['size'].'</td>';
                        echo '<td>'.$item['da'].'</td>';
                        echo '<td>'.$item['duong'].'</td>';
                        echo '<td>';
                            if (isset($item['listTP']) && count($item['listTP']) > 0)
                            {
                                foreach ($item['listTP'] as $tp)
    
                                { echo '<span>'.$tp['TenTP'].'</span><br/>';}
                        }
                        echo '</td>';
                        echo '<td>'.$item["soluong"].' x '.$tienTS.'</td>';
                        echo '<td>'.$item["soluong"].' x '.$tongTienTP.'</td>';
                        echo '<td>'.$tongTien.'</td>';
                        echo '<td><span style="color:red">Xóa</span></td>';
                    echo '</tr>';
                }
    
            echo '</table>';
            echo '<div style="float:right; font-size: 24px; font-weight:bold; margin-right: 40px">Tổng hóa đơn: '.$tongTatCa.'</div>';
            if ($tongSL < 2)
            {
                echo '<div style="margin-left: 20px; font-size: 15px; font-weight: bold">Bạn cần mua ít nhất 2 ly để có thể tiến hành gửi đơn hàng.</div>';
            }
            else
            {
                echo '<br />
                <div style="margin-left:75px; font-size:18px; font-weight: bold">Để lại thông tin của bạn ở dưới đây</div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 contact-w3-agile2" data-aos="flip-left">
                            <div class="contact-agileits">
                                <br />
                                    <form method="post" action="/Hotel/Create" name="sentMessage" id="contactForm">
                                    <div class="control-group form-group">
    
                                        <label class="contact-p1">Họ và tên:</label>
                                        <input type="text" class="form-control" name="hoTen" id="name" required style="font-size: 15px">
                                        <p class="help-block"></p>
    
                                    </div>
                                    <div class="control-group form-group">
    
                                        <label class="contact-p1">Số điện thoại:</label>
                                        <input type="tel" class="form-control" name="sdt" id="phone" required style="font-size: 15px">
                                        <p class="help-block"></p>
    
                                    </div>
                                    <div class="control-group form-group">
    
                                        <label class="contact-p1">Địa chỉ:</label>
                                        <input type="text" class="form-control" name="diaChi" required style="font-size: 15px">
                                        <p class="help-block"></p>
    
                                    </div>
    
                                    <div class="control-group form-group">
                                        <label class="contact-p1">Ghi Chú:</label>
                                        <textarea name="ghiChu" rows="4" cols="50" class="form-control" id="ghiChu" style="font-size: 15px"></textarea>
                                        <p class="help-block"></p>
    
                                    </div>
                                    <input type="submit" value="Đặt ngay" class="btn btn-primary" style="margin: 0 auto">
                                
                            </div>
                            <br />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>';
            }
        }
        else
        {
            echo '<div style="text-align: center; color:red; width:100%; font-size: 20px"><strong>Giỏ hàng trống!!!</strong></div>
            <div style="text-align: center;width: 100%;font-size: 20px;margin-top: 10px"><strong><a href="Menu/Index"" style="color: blue; border: 2px solid #116333; padding: 5px;">Trở về menu để chọn món</a></strong></div>';
        }
?>
</div>
</section>