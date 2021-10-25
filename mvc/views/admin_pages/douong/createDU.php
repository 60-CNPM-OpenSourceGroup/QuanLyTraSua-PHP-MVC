<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Thêm đồ uống</h2>
		</div>
		<div class="panel-body">
			<form action="DoUong/Store" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Mã đồ uống:</label>
					<input type="text" class="form-control" id="madu" name="madu" readonly value="<?php echo $data['madu']?>">
				</div>

				<div class="form-group">
					<label>Tên sản phẩm:</label>
					<input required="true" type="text" class="form-control" id="tendu" name="tendu">
				</div>

				<div class="form-group">
					<label>Giá:</label>
					<input required="true" type="text" class="form-control" id="dongia" name="dongia">
				</div>

				<div class="form-group">
					<label>Ảnh đồ uống:</label>
					<input required="true" type="file" id="hinh" name="hinh">
				</div>

				<div class="form-group">
					<label>Ngày thêm:</label>
					<input type="date" name="ngaythem">
				</div>

				<div class="form-group">
					<label>Bán chạy:</label>
					<input type="checkbox" name="banchay" value="1">
				</div>

				<div class="form-group">
					<label>Loại đồ uống:</label>
					<select name="loaiDU" class="form-control">
						<?php
						foreach ($data['listTenLoaiDU'] as $loaiDU) {
							if ($data["du"]["MaLoaiDU"] == $loaiDU['MaLoaiDU']) {
								$s = "selected";
							} else {
								$s = "";
							}
							echo '<option ' . $s . ' value="' . $loaiDU['MaLoaiDU'] . '" class = "form-control">' . $loaiDU['TenLoaiDU'] . '</option>';
						}
						?>
					</select>
				</div>
				<!-- <button class="btn btn-success">Thêm</button> -->
				<input type="submit" name="them" class="btn btn-success" size="10" value="Thêm mới" />
			</form>
		</div>
	</div>
</div>