<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm loại topping</h2>
        </div>
        <div class="panel-body">
            <form action="LoaiTopping/Store" method="post">
                <div class="form-group">
                    <label>Mã loại topping:</label>
                    <input type="text" class="form-control" id="maltp" name="maltp">
                     <span class="text-danger"><?php if (isset($_SESSION['error'])) {
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            } ?></span>
                </div>

                <div class="form-group">
                    <label>Tên loại topping:</label>
                    <input required="true" type="text" class="form-control" id="tenltp" name="tenltp">
                </div>
                <button class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>
</div>


