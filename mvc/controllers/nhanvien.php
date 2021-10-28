<?php
class NhanVien extends Controller{

    public $nvModel;
    public $nnvModel;
    public function __construct()
    {
        if(!isset($_SESSION["user"])){
            $this->redirectTo("Login", "Index");
        }
        $this->nvModel = $this->model("NhanVienModel");
        $this->nnvModel = $this->model("NhomNhanVienModel");
    }

    function Index(){
        $listNV = json_decode($this->nvModel->getNV(), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        $this->view("layoutAdmin",
        [
            "page"=>"nhanvien/indexNV",
            'listNV' => $listNV,
            'listTenNhomNV' => $listTenNhomNV
        ]
    );
    }

    function Details($id) {
        $nv = json_decode($this->nvModel->getNhanVienById($id), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        //view edit
        if(count($nv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhanvien/detailsNV',
                'nv' => $nv[0],
                'listTenNhomNV' => $listTenNhomNV
            ]);
        }
        else
            echo "Không tìm thấy";
    }

    function Create()
    {
        $listNV = json_decode($this->nvModel->getNV(), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        //tạo mã tự động
        $dem = count($listNV);
        $manv = "NV";
        if ($dem < 10) {
            $manv .= "000" . ($dem + 1);
        } else if ($dem >= 10) {
            $manv .= "00" . ($dem + 1);
        } else if ($dem >= 100) {
            $manv .= "0" . ($dem + 1);
        } else if ($dem >= 1000) {
            $manv .= ($dem + 1);
        }
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page"=>"nhanvien/createNV",
                "manv" => $manv,
                'listTenNhomNV' => $listTenNhomNV
            ]
        );
    }

    function Store()
    {
        $listNV = json_decode($this->nvModel->getNV(), true);
        //tạo mã tự động
        $dem = count($listNV);
        $manv = "NV";
        if ($dem < 10) {
            $manv .= "000" . ($dem + 1);
        } else if ($dem >= 10) {
            $manv .= "00" . ($dem + 1);
        } else if ($dem >= 100) {
            $manv .= "0" . ($dem + 1);
        } else if ($dem >= 1000) {
            $manv .= ($dem + 1);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["tennv"])) {
                $tennv = $_POST['tennv'];
            }
            if (isset($_POST["gioitinh"])) {
                $gioitinh = $_POST['gioitinh'];
            }
            if (isset($_POST["ngaysinh"])) {
                $ngaysinh = $_POST['ngaysinh'];
                $ngaysinh = str_replace('/', '-', $ngaysinh);
                $ngaysinh = date('Y-m-d', strtotime($ngaysinh));
            }
            if (isset($_POST["diachi"])) {
                $diachi = $_POST['diachi'];
            }

            if (isset($_POST["email"])) {
                $email = $_POST['email'];
            }

            if (isset($_POST["password"])) {
                $password = $_POST['password'];
            }

            if (isset($_POST["sdt"])) {
                $sdt = $_POST['sdt'];
            }
            if ($_FILES["hinhanh"]['name'] != NULL) {
                $hinhanh = $_FILES["hinhanh"]['name'];
                move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "public/upload/nguoidung/" . $_FILES["hinhanh"]["name"]);
            }

            if (isset($_POST["nhomNV"])) {
                $nhomNV = $_POST['nhomNV'];
            }

            $save = $this->model("NhanVienModel");
            $save->insert($manv, $tennv, $gioitinh, $ngaysinh, $diachi, $email, md5($password), $sdt, $hinhanh, $nhomNV);
        }

        return $this->redirectTo("NhanVien", "Index");
    }

    function Edit($id)
    {
        $nv = json_decode($this->nvModel->getNhanVienById($id), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);

        //view edit
        if (count($nv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhanvien/editNV',
                'nv' => $nv[0],
                'listTenNhomNV' => $listTenNhomNV
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenAnh = "";
            $maNV = $_POST['maNV'];
            $tenNV = $_POST['tenNV'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioiTinh'];
            $diaChi = $_POST['diaChi'];
            $sdt = $_POST['sdt'];
            if(isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['name'] != ""){
                $hinh = $_FILES['hinhAnh'];
                $tenAnh = $hinh['name'];
                move_uploaded_file($hinh['tmp_name'], "public/upload/nguoidung/" . $tenAnh);
                $result = $this->nvModel->update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $tenAnh);
            }
            else {
                $result = $this->nvModel->update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, null);
            }
            if (mysqli_affected_rows($result) == 1 || mysqli_affected_rows($result) == 0) {
                if($_SESSION['user']['maNV'] == $maNV) 
                {
                    if($tenAnh != "") {
                        $_SESSION['user']['hinhAnh'] = $tenAnh;
                    }
                    $_SESSION['user']['tenNV'] = $tenNV;
                    
                }
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo('NhanVien', 'IndexNV');
            }
        }
    }

    function Delete($id) {
        $nv = json_decode($this->nvModel->getNhanVienById($id), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        //view edit
        if(count($nv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhanvien/deleteNV',
                'nv' => $nv[0],
                'listTenNhomNV' => $listTenNhomNV
            ]);
        }
        else
            echo "Không tìm thấy";
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("NhanVienModel");
            $confirm->delete($id);
            $_SESSION['thongbao'] = "Xóa nhân viên thành công";
        }
        return $this->redirectTo("NhanVien", "Index");
    }

}
?>