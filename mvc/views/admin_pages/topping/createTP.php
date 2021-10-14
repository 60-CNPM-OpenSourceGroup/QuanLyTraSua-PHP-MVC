<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Thêm topping</h2>
		</div>
		<div class="panel-body">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Mã topping:</label>
					<input type="text" class="form-control" id="matp" name="matp" disabled>
				</div>

				<div class="form-group">
					<label>Tên sản phẩm:</label>
					<input required="true" type="text" class="form-control" id="tentp" name="tentp">
				</div>

				<div class="form-group">
					<label>Giá:</label>
					<input required="true" type="number" class="form-control" id="dongia" name="dongia">
				</div>

				<div class="form-group">
					<label>Ảnh topping:</label>
					<input required="true" type="file" id="anhtp" name="anhtp">
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
				<button class="btn btn-success">Thêm</button>
			</form>
		</div>
	</div>
</div>