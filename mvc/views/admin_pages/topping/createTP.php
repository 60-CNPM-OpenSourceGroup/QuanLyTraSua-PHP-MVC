<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Thêm topping</h2>
		</div>
		<div class="panel-body">
			<form action="Topping/Store" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Mã topping:</label>
					<input type="text" class="form-control" id="matp" name="matp" readonly value="<?php echo $data['matp']?>">
				</div>

				<div class="form-group">
					<label>Tên sản phẩm:</label>
					<input required="true" type="text" class="form-control" id="tentp" name="tentp">
				</div>

				<div class="form-group">
					<label>Giá:</label>
					<input required="true" type="text" class="form-control" id="dongia" name="dongia">
				</div>

				<div class="form-group">
					<label>Ảnh topping:</label>
					<input required="true" type="file" id="hinh" name="hinh">
				</div>

				<div class="form-group">
					<label>Loại topping:</label>
					<select name="loaiTP" class="form-control">
						<?php
						foreach ($data['listTenLoaiTP'] as $loaiTP) {
							if ($data["tp"]["MaLoaiTP"] == $loaiTP['MaLoaiTP']) {
								$s = "selected";
							} else {
								$s = "";
							}
							echo '<option ' . $s . ' value="' . $loaiTP['MaLoaiTP'] . '" class = "form-control">' . $loaiTP['TenLoaiTP'] . '</option>';
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