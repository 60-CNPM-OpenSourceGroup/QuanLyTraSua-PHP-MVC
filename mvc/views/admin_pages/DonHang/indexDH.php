<style>
    table {
        margin-top: 25px;
        font-size: 1rem;
    }

    table th,
    table td {
        text-align: center;
    }

    .row_head,
    .row_body {
        vertical-align: middle !important;
    }

    table tr:nth-child(even) {
        background-color: aqua;
    }

    .pagination-container {
        margin-top: 40px;
    }

    .pagination li:hover {
        cursor: pointer;
    }

    .pagination {
        display: inline-block;
    }

    .pagination li.active {
        background-color: darkseagreen;
        color: white;
        border-radius: 5px;
    }

    .pagination li {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

    .pagination li:hover:not(.active) {
        background-color: #ddd;
        border-radius: 5px;
    }
</style>

<section>
    <h3>DANH SÁCH ĐƠN ĐẶT HÀNG TRỰC TUYẾN</h3>
    <div class="form-group" style="width: 100%; display: flex; margin-top: 60px;">
        <!-- Show Numbers Of Rows -->
        <div>
            <span style="line-height: 2.4rem; font-weight: 800; margin-right: 1.5rem;">Số dòng hiển thị: </span>
        </div>
        <div style="width: 12%;">
            <select class="form-control" name="state" id="maxRows">
                <option value="5000">Hiện tất cả</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="70">70</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    <table class="table table-striped table-class" id="table-id">

        <tr>
            <th class="row_head">STT</th>
            <th class="row_head">Mã hóa đơn</th>
            <th class="row_head">Họ tên</th>
            <th class="row_head">Số điện thoại</th>
            <th class="row_head">Địa chỉ</th>
            <th class="row_head">Tổng tiền</th>
            <th class="row_head">Ngày lập</th>
            <th class="row_head">Ghi chú</th>
            <th class="row_head">Tình trạng</th>
            <th class="row_head">Shipper</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
        $stt = 1;
        foreach ($data['listHD'] as $item) {
            $date = str_replace('-', '/', $item["NgayLap"]);
            echo "
            <tr>
                <td class='row_body'>" . ($stt++) . "</td>
                <td class='row_body'>" . $item['MaHD'] . "</td>
                <td class='row_body'>" . $item['HoTen'] . "</td>
                <td class='row_body'>" . $item['Sdt'] . "</td>
                <td class='row_body'>" . $item['DiaChi'] . "</td>
                <td class='row_body'>" . $item['TongTien'] . "</td>
                <td class='row_body'>" . date('d/m/Y', strtotime($date)) . "</td>
                <td class='row_body'>" . $item['GhiChu'] . "</td>
                <td class='row_body'>" . $item['TinhTrang'] . "</td>";

            // var_dump($item['MaNV']);

            foreach ($data['tenNV'] as $ten) {
                if ($ten['maNV'] == $item['MaNV']) {
                    echo "<td class='row_body'>" . $ten['tenNV'] . "</td>";
                }
                // else {
                //     echo "<td class='row_body'>Chưa có</td>";
                // }
            }

            echo "
                <td class='row_body'>
                    <a href='DonHang/Check/" . $item["MaHD"] . "'><i class='fa fa-edit'></i></a>&nbsp;|&nbsp;
                    <a href='DonHang/Details/" . $item["MaHD"] . "'><i class='fa fa-info-circle'></i></a>&nbsp;|&nbsp;
                    <a href='DonHang/Delete/" . $item["MaHD"] . "'><i class='fa fa-trash'></i></a>&nbsp;|&nbsp;
                    <a href='DonHang/Print/" . $item["MaHD"] . "'><i class='fa fa-print'></i></a>
                </td>
            </tr>
            ";
        }
        ?>
    </table>
    <!-- Start Pagination -->
    <div class='pagination-container'>
        <nav style="text-align: center;">
            <ul class="pagination">
                <li data-page="prev" class="page-item">
                    <span>
                        &laquo; <span class="sr-only">(current)
                        </span></span>
                </li>
                <!--	Here the JS Function Will Add the Rows -->
                <li data-page="next" id="prev">
                    <span> &raquo; <span class="sr-only">(current)</span></span>
                </li>
            </ul>
        </nav>
    </div>
    </div>
</section>

<script src="public/admin/Admin/js/phantrang.js"></script>