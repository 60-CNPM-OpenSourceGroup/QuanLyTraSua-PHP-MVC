<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Chỉnh sửa loại topping</h2>
		</div>
		<div class="panel-body">
			<form action="" method="post">
				<div class="form-group">
					<label>Mã loại topping:</label>
					<input required="true" type="text" class="form-control" id="maltp" name="maltp" disabled value="<?php echo $data['ltp']['MaLoaiTP'] ?>">
				</div>

				<div class="form-group">
					<label>Tên loại sản phẩm:</label>
					<input required="true" type="text" class="form-control" id="tenltp" name="tenltp" value="<?php echo $data['ltp']['TenLoaiTP'] ?>">
				</div>

				<div class="form-group">
					<div class="col-md-offset-2 col-md-6">
						<input type="submit" value="Lưu" class="btn btn-primary" />
					</div>
					<div class="col-md-offset-2 col-md-6">
						<button class="comeback">
							<a href="javascript:window.history.back(-1);">Quay lại</a>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>