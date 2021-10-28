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
<?php
// echo "INDEX ĐỒ UỐNG";
?>
<section>
    <h3>DANH SÁCH NHÂN VIÊN</h3>
    <a href="NhanVien/Create">
        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm mới</button>
    </a>
    <?php
    if(isset($_SESSION['thongbao'])) {
        echo "<div class='alert alert-success'>";
        echo $_SESSION['thongbao'];
        echo "</div>";
        unset($_SESSION['thongbao']);
    }
    ?>
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
            </select>
        </div>
    </div>
    <table class="table table-striped table-class" id="table-id">
        <tr>
            <th class="row_head">STT</th>
            <th class="row_head">Hình ảnh</th>
            <th class="row_head">Mã nhân viên</th>
            <th class="row_head">Tên nhân viên</th>
            <th class="row_head">Giới tính</th>
            <th class="row_head">Ngày sinh</th>
            <th class="row_head">Địa chỉ</th>
            <th class="row_head">Số điện thoại</th>
            <th class="row_head">Nhóm nhân viên</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
        $i = 1;
        foreach ($data['listNV'] as $item) {
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img src="public/upload/nguoidung/<?php echo $item['hinhAnh'] ?>" alt="<?php echo $item['tenNV'] ?>" width="50" height="50"></td>
                <td><?php echo $item["maNV"]; ?></td>
                <td><?php echo $item["tenNV"]; ?></td>
                <td><?php if ($item["gioiTinh"] == 1)
                        echo "Nam";
                    else
                        echo "Nữ";
                    ?></td>
                <td><?php

                    $date = str_replace('-', '/', $item["ngaySinh"]);
                    echo date('d/m/Y', strtotime($date));
                    ?></td>
                <td><?php echo $item["diaChi"]; ?></td>
                <td><?php echo $item["sdt"]; ?></td>
                <td><?php

                    foreach ($data['listTenNhomNV'] as $nhomNV) {
                        if ($item["IDNhom"] == $nhomNV['IDNhom']) {
                            echo $nhomNV['TenNhom'];
                        }
                    }

                    ?></td>
                <td width="30">
                    <?php
                    echo "<a href='NhanVien/Edit/" . $item["maNV"] . "'><img src='public/upload/topping/edit.png' width='20' height='20'/></a>&nbsp; ";
                    echo "<a href='NhanVien/Details/" . $item["maNV"] . "'><img src='public/upload/topping/details.png' width='20' height='20'/></a>&nbsp; ";
                    echo "<a href='NhanVien/Delete/" . $item["maNV"] . "'><img src='public/upload/topping/delete.png' width='20' height='20'/></a>&nbsp; ";
                    ?>
                </td>
            </tr>
        <?php
            $i++;
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