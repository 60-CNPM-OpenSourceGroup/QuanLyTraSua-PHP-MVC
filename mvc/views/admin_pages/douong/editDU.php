<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Chỉnh sửa đồ uống</h2>
		</div>
		<div class="panel-body">
			<form action="DoUong/Save/<?php echo $data["du"]['MaDU'] ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Mã đồ uống:</label>
					<input required="true" type="text" class="form-control" id="madu" name="madu" disabled value="<?php echo $data['du']['MaDU'] ?>">
				</div>

				<div class="form-group">
					<label>Tên sản phẩm:</label>
					<input required="true" type="text" class="form-control" id="tendu" name="tendu" value="<?php echo $data['du']['TenDU'] ?>">
				</div>

				<div class="form-group">
					<label>Giá:</label>
					<input required="true" type="number" class="form-control" id="dongia" name="dongia" value="<?php echo $data['du']['DonGia'] ?>">
				</div>

				<div class="form-group">
					<label>Ảnh đồ uống:</label>
					<input type="text" class="form-control" name="anhdu" value="<?php echo $data['du']['HinhAnh'] ?>">
					<input type="file" id="anhdu" name="anhdu" value="<?php echo $data['du']['HinhAnh'] ?>">
				</div>

				<?php $date = str_replace('-', '/', $data['du']["NgayThem"]); ?>
				<div class="form-group">
					<label>Ngày thêm:</label>
					<input required="true" type="text" class="form-control" name="ngaythem" value="<?php echo date('d/m/Y', strtotime($date)); ?>">
				</div>

				<div class="form-group">
					<label>Bán chạy:</label>
					<input type="checkbox" name="banchay" value="1" <?php
																	if ($data['du']["BanChay"] == 1) echo 'checked';
																	else echo ""
																	?>>
				</div>

				<div class="form-group">
					<label>Loại đồ uống:</label>
					<select name="loaiDU" class="form-control">
						<!-- <option value="<?php echo $data["du"]["MaLoaiDU"]; ?>" class="form-control"> -->
						<?php
						echo $data["du"]["TenLoaiDU"];

						?></option>
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