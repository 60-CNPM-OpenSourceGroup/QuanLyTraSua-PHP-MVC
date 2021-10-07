<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Topping</h2>
			</div>
			<div class="panel-body">
				<form method="post" enctype = "multipart/form-data" >

                    <div class="form-group">
					  <label>Mã topping:</label>
					  <input required="true" type="text" class="form-control" id="matp" name="matp">
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
					  <label>Ngày thêm:</label>
					  <input type="date" >
					</div>

                    <!-- <div class="form-group">
					  <label>Bán chạy:</label>
					  <input type="checkbox">
					</div> -->

					<div class="form-group">
					  <label>Loại topping:</label>
					  <select class="form-control" id="id_category" name="id_category" >
						<option>Lựa chọn danh mục</option>
						<?php
							// $sql          = 'select * from category';
							// $categoryList = executeResult($sql);

							// foreach ($categoryList as $item){
							// 	if($item['id']==$id_category){
							// 		echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
							// 	}
							// 	else{
							// 		echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
							// 	}
							// }
						?>
					  </select>
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>