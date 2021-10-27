<h3>ĐỔI MẬT KHẨU</h3>
<?php 
    if(isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">';
        echo $_SESSION['error'];
        echo '</div>';
        unset($_SESSION['error']); 
    }
?>
<div class="mt-3">
    <form action="canhan/saveMK" method="POST">
        <div class="row">
            <div class="mb-3 col-md-12">
                <label for="oldPass" class="form-label"><b>Mật khẩu cũ</b></label>
                <input type="password" class="form-control w-50" id="oldPass" name="oldPass" value="<?php if(isset($_POST['oldPass'])) echo $_POST['oldPass'] ?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label for="newPass" class="form-label"><b>Mật khẩu mới</b></label>
                <input type="password" class="form-control w-50" id="newPass" name="newPass" value="<?php if(isset($_POST['newPass'])) echo $_POST['newPass'] ?>" required>
            </div>
            <div class="mb-3 col-md-12">
                <label for="againPass" class="form-label"><b>Nhập lại mật khẩu</b></label>
                <input type="password" class="form-control w-50" id="againPass" name="againPass" value="<?php if(isset($_POST['againPass'])) echo $_POST['againPass'] ?>" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>