<h3>THÊM MỚI PHÂN QUYỀN</h3>
<?php 
    if(isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">';
        echo $_SESSION['error'];
        echo '</div>';
        unset($_SESSION['error']); 
    }
?>
<form action="PhanQuyen/Store" method="post">
    <div class="form-horizontal">
        <hr />
        <div class="form-group1">
            <label for="idNhom" class="control-label col-md-4"><b>Nhóm nhân viên</b></label>
            <div class="col-md-6">
                <select name="idNhom" id="idNhom" class="form-control">

                    <?php
                    foreach ($data['nnv'] as $item) {
                        echo "<option value='" . $item['IDNhom'] . "'>" . $item['TenNhom'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group1">
            <label for="tenNhom" class="control-label col-md-4"><b>Quyền</b></label>
            <div class="col-md-6">
                <select name="idQuyen" id="idQuyen" class="form-control">>
                    <?php
                    foreach ($data['quyen'] as $item) {
                        echo "<option value='" . $item['IDQuyen'] . "'>" . $item['TenQuyen'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div style="margin-top: 10px;" class="col-md-offset-2 col-md-10">
                <input type="submit" name="them" value="Thêm mới" class="btn btn-primary" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <a class="btn btn-primary" href="phanquyen/index">Quay lại</a>
            </div>
        </div>
    </div>
</form>