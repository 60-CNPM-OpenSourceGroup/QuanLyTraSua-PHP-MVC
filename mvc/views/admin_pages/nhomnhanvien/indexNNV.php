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
    
    .pagination-container{
        margin-top: 40px;
    }
    .pagination li:hover {
        cursor: pointer;
    }

    .pagination {
        display: inline-block;
    }
    .pagination li.active{
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
    <h3>DANH SÁCH NHÓM NHÂN VIÊN</h3>
    <a href="NhomNhanVien/Create">
        <button class="btn btn-success" style="margin-bottom: 15px;">Thêm mới</button>
    </a>
    <?php
    if (isset($_SESSION['thongbao'])) {
        echo "<div class='alert alert-success'>";
        echo $_SESSION['thongbao'];
        echo "</div>";
        unset($_SESSION['thongbao']);
    }
    ?>
      <form action="" method="GET">
                        <table style="margin: auto; width:350px;">
                            <tr>
                                <td><b>Họ tên: </b></td>
                                <td><input type="text" name="tenNhom" class="form-control" value="<?php if(isset($_POST['searchTenNhom'])) echo $_POST['searchTenNhom'] ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Lọc" class="btn btn-primary" name="searchBtn" />
                                    <a href="nhomnhanvien/index" class="btn btn-primary">Làm mới</a>
                                </td>
                            </tr>
                        </table>
                    </form>
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
            <th class="row_head">Mã nhóm nhân viên</th>
            <th class="row_head">Tên nhóm nhân viên</th>
            <th class="row_head">Chức năng</th>
        </tr>
        <?php
          $i = 1;
          foreach ($data['listNNV'] as $item) { 
          ?>
            <tr>
            <td><?php echo $i; ?></td>
              <td><?php echo $item["IDNhom"]; ?></td>
              <td><?php echo $item["TenNhom"]; ?></td>
              <td width="30">
                    <?php
                    echo "<a href='NhomNhanVien/Delete/" . $item["IDNhom"] . "'><img src='public/upload/topping/delete.png' width='20' height='20'/></a>&nbsp; ";
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