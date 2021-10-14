<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Chỉnh sửa topping</h2>
		</div>
		<div class="panel-body">
			<form action="Topping/Save/<?php echo $data["tp"]['MaTP'] ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Mã topping:</label>
					<input required="true" type="text" class="form-control" id="matp" name="matp" disabled value="<?php echo $data['tp']['MaTP'] ?>">
				</div>

				<div class="form-group">
					<label>Tên sản phẩm:</label>
					<input required="true" type="text" class="form-control" id="tentp" name="tentp" value="<?php echo $data['tp']['TenTP'] ?>">
				</div>

				<div class="form-group">
					<label>Giá:</label>
					<input required="true" type="number" class="form-control" id="dongia" name="dongia" value="<?php echo $data['tp']['DonGia'] ?>">
				</div>

				<div class="form-group">
					<label>Ảnh topping:</label>
					<input type="text" class="form-control" name="anhtp" value="<?php echo $data['tp']['HinhAnh'] ?>">
					<input type="file" id="anhtp" name="anhtp" value="<?php echo $data['tp']['HinhAnh'] ?>">
				</div>

				

				<div class="form-group">
					<label>Loại topping:</label>
					<select name="loaiTP" class="form-control">
						<!-- <option value="<?php echo $data["tp"]["MaLoaiTP"]; ?>" class="form-control"> -->
						<?php
						echo $data["tp"]["TenLoaiTP"];

						?></option>
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