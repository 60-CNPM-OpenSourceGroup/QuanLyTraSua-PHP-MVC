<?php
require_once './mvc/common/validate.php';
class NhanVien extends Controller
{

    public $nvModel;
    public $nnvModel;
    public function __construct()
    {
        $this->nvModel = $this->model("NhanVienModel");
        $this->nnvModel = $this->model("NhomNhanVienModel");
        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        } else {
            $pq = new HasCredentials("QUANLYNHANVIEN");
            if (!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function Index()
    {
        $listNV = json_decode($this->nvModel->getNV(), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "nhanvien/indexNV",
                'listNV' => $listNV,
                'listTenNhomNV' => $listTenNhomNV
            ]
        );
    }

    function TimKiem()
    {       
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        // $tukhoa ="";
        //  $db_tk = [];

        if(isset($_POST['maNV'])){
            $maNV = $_POST['maNV'];
            $db_tk = json_decode($this->nvModel->TimKiemMaNV($maNV), true);
        }
        
        if(isset($_POST['tenNV'])){
            $tenNV = $_POST['tenNV'];
            $db_tk = json_decode($this->nvModel->TimKiemTenNV($tenNV), true);
        }
        
        // trả về list đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "nhanvien/timkiem",
                // 'listDU' => $listDU,
                'listTenNhomNV' => $listTenNhomNV,
                "timkiem" => $db_tk,
                // "thongbao" => $tb
            ]
        );
    }


    function Details($id)
    {
        $nv = json_decode($this->nvModel->getNhanVienById($id), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        //view edit
        if (count($nv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhanvien/detailsNV',
                'nv' => $nv[0],
                'listTenNhomNV' => $listTenNhomNV
            ]);
        } else
            echo "Không tìm thấy";
    }

    function Create()
    {
        $listNV = json_decode($this->nvModel->getNV(), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);

        //tạo mã tự động
        $getma = end($listNV);
        $manv = substr($getma["maNV"], 2 );
        $ma = "NV";

        if ((int)$manv < 10) {
            $ma .= "000" . ((int)$manv + 1);
        } else if ((int)$manv >= 10) {
            $ma .= "00" . ((int)$manv + 1);
        } else if ((int)$manv >= 100) {
            $ma .= "0" . ((int)$manv + 1);
        } else if ((int)$manv >= 1000) {
            $ma .= ((int)$manv + 1);
        }
        
        // thêm mới đồ uống
        $this->view(
            "layoutAdmin",
            [
                "page" => "nhanvien/createNV",
                "manv" => $ma,
                'listTenNhomNV' => $listTenNhomNV
            ]
        );
    }

    function Store()
    {
<<<<<<< HEAD
        // $listNV = json_decode($this->nvModel->getNV(), true);
        // //tạo mã tự động
        // $dem = count($listNV);
        // $manv = "NV";
        // if ($dem < 10) {
        //     $manv .= "000" . ($dem + 1);
        // } else if ($dem >= 10) {
        //     $manv .= "00" . ($dem + 1);
        // } else if ($dem >= 100) {
        //     $manv .= "0" . ($dem + 1);
        // } else if ($dem >= 1000) {
        //     $manv .= ($dem + 1);
        // }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $manv = $_POST['manv'];
            $tennv = $_POST['tennv'];
            $gioiTinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sdt = $_POST['sdt'];
=======
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["manv"])) {
                $manv = $_POST['manv'];
            }
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
>>>>>>> e3abcefa1b949b977a6a7e7228184c0bfd40f3ab
            if ($_FILES["hinhanh"]['name'] != NULL) {
                $hinhanh = $_FILES["hinhanh"]['name'];
                move_uploaded_file($_FILES["hinhanh"]["tmp_name"], "public/upload/nguoidung/" . $_FILES["hinhanh"]["name"]);
            }
            $nhomNV = $_POST['nhomNV'];

            validateTenNV($tennv);
            validateNgaySinh($ngaysinh);
            validateDiaChi($diachi);
            validateEmail($email);
            validateMatKhau($password);
            validateSoDienThoai($sdt);
            validateAnhNV($_FILES["hinhanh"]['name']);
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['nv'] = [
                    'tenNV' => $tennv,
                    'gioiTinh' => $gioiTinh,
                    'ngaySinh' => $ngaysinh,
                    'diaChi' => $diachi,
                    'email' => $email,
                    'matKhau' => $password,
                    'soDienThoai' => $sdt,
                    'nnv' => $nhomNV
                ];
                return $this->redirectTo("NhanVien", "Create");
            } else {
                $save = $this->model("NhanVienModel");
                $save->insert($manv, $tennv, $gioiTinh, $ngaysinh, $diachi, $email, md5($password), $sdt, $hinhanh, $nhomNV);
                $_SESSION['thongbao'] = "Thêm mới nhân viên thành công";
            }
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

    function Save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenAnh = "";
            $maNV = $_POST['maNV'];
            $tenNV = $_POST['tenNV'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioitinh'];
            $diaChi = $_POST['diaChi'];
            $sdt = $_POST['sdt'];
            $nhomNV = $_POST['nhomNV'];

            validateTenNV($tenNV);
            validateNgaySinh($ngaySinh);
            validateDiaChi($diaChi);
            validateSoDienThoai($sdt);
            
            if (isset($_SESSION['error']) && count($_SESSION['error']) > 0) {
                $_SESSION['nv'] = [
                    'tenNV' => $tenNV,
                    'gioiTinh' => $gioiTinh,
                    'ngaySinh' => $ngaySinh,
                    'diaChi' => $diaChi,
                    'soDienThoai' => $sdt,
                    'nnv' => $nhomNV
                ];
                return $this->redirectTo("NhanVien", "Edit", ['id' => $maNV]);
            }
            else if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['name'] != "") {
                $hinh = $_FILES['hinhAnh'];
                $tenAnh = $hinh['name'];
                move_uploaded_file($hinh['tmp_name'], "public/upload/nguoidung/" . $tenAnh);
                $result = $this->nvModel->update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, $tenAnh, $nhomNV);
            } else {
                $result = $this->nvModel->update($maNV, $tenNV, $gioiTinh, $ngaySinh, $diaChi, $sdt, null, $nhomNV);
            }

            if (mysqli_affected_rows($result) == 1 || mysqli_affected_rows($result) == 0) {
                if ($_SESSION['user']['maNV'] == $maNV) {
                    if ($tenAnh != "") {
                        $_SESSION['user']['hinhAnh'] = $tenAnh;
                    }
                    $_SESSION['user']['tenNV'] = $tenNV;
                }
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo("NhanVien", "Index");
            }
        }
    }

    function Delete($id)
    {
        $nv = json_decode($this->nvModel->getNhanVienById($id), true);
        $listTenNhomNV = json_decode($this->nnvModel->getNNV(), true);
        //view edit
        if (count($nv) > 0) {
            $this->view("layoutAdmin", [
                'page' => 'nhanvien/deleteNV',
                'nv' => $nv[0],
                'listTenNhomNV' => $listTenNhomNV
            ]);
        } else
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
