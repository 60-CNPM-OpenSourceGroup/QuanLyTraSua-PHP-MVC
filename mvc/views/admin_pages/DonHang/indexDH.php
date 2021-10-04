<style type="text/css">
    #gridContent {
        font-size: 15px;
    }

    .grid-footer {
        color: #000;
        font: 17px Calibri;
        text-align: center;
        font-weight: bold;
    }

    .grid-footer a {
        background-color: #ffffff;
        color: blue;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 1px 10px 2px 10px;
    }

    .grid-footer a:active,
    a:hover {
        background-color: #ffffff;
        color: #FFAD33;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .alternatingRowStyle {
        background-color: aliceblue;
    }

    table .table1 {
        text-align: left;
        margin-left: 0px;
        margin-right: 0px;
        width: 800px;
    }

    .tr,
    .td {
        text-align: left;
    }

    .ChildGrid {
        width: 80%;
        margin: 0 auto
    }

    .ChildGrid th {
        background-color: #4e73df;
        color: #fff;
        font-weight: bold;
    }
</style>

<h3>DANH SÁCH ĐƠN ĐẶT HÀNG TRỰC TUYẾN</h3>
<div id="gridContent">
    <table>
        <tr>
            <th>STT</th>
            <th>Mã hóa đơn</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền</th>
            <th>Ngày lập</th>
            <th>Ghi chú</th>
            <th>Tình trạng</th>
            <th>Shipper</th>
            <th>Chức năng</th>
        </tr>
        <?php
        $stt = 1;
        foreach ($data['listHD'] as $item) {
            echo "
            <tr>
                <td>".($stt++)."</td>
                <td>".$item['MaHDOnl']."</td>
                <td>".$item['HoTen']."</td>
                <td>".$item['Sdt']."</td>
                <td>".$item['DiaChi']."</td>
                <td>".$item['TongTien']."</td>
                <td>".$item['NgayLap']."</td>
                <td>".$item['GhiChu']."</td>
                <td>".$item['TinhTrang']."</td>
                <td>"."Bảo"."</td>
                <td>"."123"."</td>
            </tr>
            ";
        }
        ?>
        
        
    </table>
</div>