<div class="checkform">
	<div class="content">
		<h3 class="title">Chỉnh sửa loại topping</h3>

		<form action="LoaiTopping/Save/<?php echo $data["ltp"]['MaLoaiTP'] ?>" method="post">
			<div class="form-horizontal">
				<div class="form-group1">
					<label for="" class="control-label col-md-4">Mã loại topping: </label>
					<div class="col-md-8">
						<input type="text" name="maltp" class="form-control" readonly value="<?php echo $data['ltp']['MaLoaiTP'] ?>">
					</div>
				</div>

				<div class="form-group1">
					<label for="" class="control-label col-md-4">Tên loại topping: </label>
					<div class="col-md-8">
						<input type="text" name="tenloaitp" class="form-control" value="<?php echo $data['ltp']['TenLoaiTP'] ?>">
					</div>
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
			</div>
		</form>
	</div>
</div>