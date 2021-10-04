<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary">DANH SÁCH NHÂN VIÊN</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã nhân viên</th>
              <th>Tên nhân viên</th>
              <th>Giới tính</th>
              <th>Ngày sinh</th>
              <th>Địa chỉ</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Hình ảnh</th>
              <th>Nhóm nhân viên</th>
            </tr>
          </thead>
          <?php
          $i = 1;
          while ($NhanVien = mysqli_fetch_array($data["NhanVien"])) { ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $NhanVien["maNV"]; ?></td>
              <td><?php echo $NhanVien["tenNV"]; ?></td>
              <td><?php if ($NhanVien["gioiTinh"] == 1)
                    echo "Nam";
                  else
                    echo "Nữ";
                  ?></td>
              <td><?php 
              
              $date = str_replace('-', '/', $NhanVien["ngaySinh"]);
              echo date('d/m/Y', strtotime($date));
               ?></td>
              <td><?php echo $NhanVien["diaChi"]; ?></td>
              <td><?php echo $NhanVien["email"]; ?></td>
              <td><?php echo $NhanVien["sdt"]; ?></td>
              <td><?php echo $NhanVien["hinhAnh"]; ?></td>
              <td><?php echo $NhanVien["IDNhom"]; ?></td>
            </tr>

          <?php
            $i++;
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->