

    <div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 class="text-center">Thêm loại đồ uống</h2>
        </div>
        <div class="panel-body">
            <form action="LoaiDoUong/Store" method="post">
                <div class="form-group">
                    <label>Mã loại đồ uống:</label>
                    <input type="text" class="form-control" id="maldu" name="maldu">
                    <span class="text-danger"><?php if (isset($_SESSION['error'])) {
                                                echo $_SESSION['error'];
                                                unset($_SESSION['error']);
                                            } ?></span>
                </div>

                <div class="form-group">
                    <label>Tên loại đồ uống:</label>
                    <input required="true" type="text" class="form-control" id="tenldu" name="tenldu">
                </div>
                <button class="btn btn-success">Thêm</button>
            </form>
        </div>
    </div>
</div>