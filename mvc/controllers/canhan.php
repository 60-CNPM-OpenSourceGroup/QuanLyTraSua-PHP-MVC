<?php
class CaNhan extends Controller
{

    public $nvModel;
    public function __construct()
    {
        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        }
        $this->nvModel = $this->model("NhanVienModel");
    }

    function IndexCN()
    {
        $nv = json_decode($this->nvModel->getNhanVienById($_SESSION["user"]["maNV"]), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "canhan/indexCN",
                'nv' => $nv[0]
            ]
        );
    }
    
    function edit()
    {
        $nv = json_decode($this->nvModel->getNhanVienById($_SESSION["user"]["maNV"]), true);
        $this->view(
            "layoutAdmin",
            [
                "page" => "canhan/edit",
                'nv' => $nv[0]
            ]
        );
    }

    function save() {
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
                if($tenAnh != "") $_SESSION['user']['hinhAnh'] = $tenAnh;
                $_SESSION['user']['tenNV'] = $tenNV;
                $_SESSION['thongbao'] = "Cập nhật thông tin thành công";
                return $this->redirectTo('CaNhan', 'IndexCN');
            }
        }
    }

    function DoiMatKhau() {
        return $this->view(
            "layoutAdmin",
            [
                "page" => "canhan/doimatkhau"
            ]
        );
    }
    
    function saveMK() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nv = json_decode($this->nvModel->getNhanVienById($_SESSION["user"]["maNV"]), true);
            $oldPass = $_POST['oldPass'];
            $newPass = $_POST['newPass'];
            $againPass = $_POST['againPass'];
            if($newPass != $againPass) {
                $_SESSION['error'] = "Mật khẩu nhập lại không khớp";
                $this->redirectTo('CaNhan', 'DoiMatKhau');
            }
            else if(md5($oldPass) != $nv[0]['password']) {
                $_SESSION['error'] = "Mật khẩu cũ không đúng";
                $this->redirectTo('CaNhan', 'DoiMatKhau');
            }
            else if(md5($newPass) == $nv[0]['password']) {
                $_SESSION['error'] = "Mật khẩu mới phải khác mật khẩu cũ";
                $this->redirectTo('CaNhan', 'DoiMatKhau');
            }
            else {
                $result = $this->nvModel->doiMK($_SESSION["user"]["maNV"], md5($newPass));
                if ($result == 1) {
                    $_SESSION['thongbao'] = "Đổi mật khẩu thành công";
                    return $this->redirectTo('CaNhan', 'IndexCN');
                }
            }
        }
    }
}
