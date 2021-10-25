<div class="checkform">
	<div class="content">
		<h3 class="title">Chỉnh sửa loại đồ uống</h3>

		<form action="LoaiDoUong/Save/<?php echo $data["ldu"]['MaLoaiDU'] ?>" method="post">
			<div class="form-horizontal">
				<div class="form-group1">
					<label for="" class="control-label col-md-4">Mã loại đồ uống: </label>
					<div class="col-md-8">
						<input type="text" name="maldu" class="form-control" readonly value="<?php echo $data['ldu']['MaLoaiDU'] ?>">
					</div>
				</div>

				<div class="form-group1">
					<label for="" class="control-label col-md-4">Tên loại đồ uống: </label>
					<div class="col-md-8">
						<input type="text" name="tenloaidu" class="form-control" value="<?php echo $data['ldu']['TenLoaiDU'] ?>">
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