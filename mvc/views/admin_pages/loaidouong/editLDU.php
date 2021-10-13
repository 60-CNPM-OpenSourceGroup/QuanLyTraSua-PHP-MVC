<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Chỉnh sửa loại đồ uống</h2>
		</div>
		<div class="panel-body">
			<form action="" method="post">
				<div class="form-group">
					<label>Mã loại đồ uống:</label>
					<input required="true" type="text" class="form-control" id="maldu" name="maldu" disabled value="<?php echo $data['ldu']['MaLoaiDU'] ?>">
				</div>

				<div class="form-group">
					<label>Tên loại sản phẩm:</label>
					<input required="true" type="text" class="form-control" id="tenldu" name="tenldu" value="<?php echo $data['ldu']['TenLoaiDU'] ?>">
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