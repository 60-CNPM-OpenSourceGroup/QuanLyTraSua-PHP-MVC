<?php
class DonHang extends Controller
{

    public $dhModel;
    public $cthdModel;
    public $nvModel;
    public $cttpModel;

    public function __construct()
    {
        $this->dhModel = $this->model("HoaDonModel");
        $this->nvModel = $this->model("NhanVienModel");
        $this->cthdModel = $this->model("CTHoaDonModel");
        $this->cttpModel = $this->model("CTToppingModel");

        if (!isset($_SESSION["user"])) {
            $this->redirectTo("Login", "Index");
        }
        else {
            $pq = new HasCredentials("QUANLYHOADON");
            if(!$pq->hasCredentials()) {
                return $this->redirectTo("Credentials", "Index");
            }
        }
    }

    function Index()
    {
        $listHD = json_decode($this->dhModel->listAll(), true);
        $NV = json_decode($this->nvModel->getNV(), true);
        // $listCTHD = json_decode($this->dhModel->listAll(), true);

        $this->view("layoutAdmin", [
            'page' => 'donhang/indexDH',
            'listHD' => $listHD,
            'NV' => $NV
            // 'listCTHD' => $listCTHD
        ]);
    }

    function Check($id)
    {
        $listDH = json_decode($this->dhModel->getHoaDonById($id), true);
        $listShipper = json_decode($this->nvModel->listShipper(), true);
        // var_dump($listDH[0]['TinhTrang']);

        if ($listDH[0]['TinhTrang'] == 1) {
            //view edit
            $this->view("layoutAdmin", [
                'page' => 'donhang/checkDH',
                'listDH' => $listDH[0],
                'listShipper' => $listShipper
            ]);
        } else if ($listDH[0]['TinhTrang'] == 2 || $listDH[0]['TinhTrang'] == 0) {
            return $this->redirectTo("DonHang", "Error");
        }
    }

    function Save($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["tinhtrang"])) {
                $tinhtrang = $_POST['tinhtrang'];
            }
            if (isset($_POST["shipper"])) {
                $maNV = $_POST['shipper'];
            }

            $save = $this->model("HoaDonModel");
            $save->update($id, $tinhtrang, $maNV);
        }
        return $this->redirectTo("DonHang", "Success");
    }

    function Details($id)
    {
        $cthd = json_decode($this->cthdModel->mergeHoaDonByID($id), true);
        $shipper = json_decode($this->nvModel->listShipper(), true);
        $cttp = json_decode($this->cttpModel->mergeTopping($id), true);
        $ttkh = json_decode($this->cthdModel->mergeHoaDonByID($id), true);

        $this->view("layoutAdmin", [
            'page' => 'donhang/detailsDH',
            'cthd' => $cthd,
            'shipper' => $shipper,
            'cttp' => $cttp,
            'ttkh' => $ttkh[0]
        ]);
    }

    function Print($id)
    {
        $cthd = json_decode($this->cthdModel->mergeHoaDonByID($id), true);
        $shipper = json_decode($this->nvModel->listShipper(), true);
        $cttp = json_decode($this->cttpModel->mergeTopping($id), true);
        $ttkh = json_decode($this->cthdModel->mergeHoaDonByID($id), true);

        $this->view("layoutAdmin", [
            'page' => 'donhang/printDH',
            'cthd' => $cthd,
            'shipper' => $shipper,
            'cttp' => $cttp,
            'ttkh' => $ttkh[0]
        ]);
    }

    function Delete($id)
    {
        $donhang = json_decode($this->dhModel->getHoaDonById($id), true);
        $shipper = json_decode($this->nvModel->listShipper(), true);

        $this->view("layoutAdmin", [
            'page' => 'donhang/deleteDH',
            'donhang' => $donhang[0],
            'shipper' => $shipper
        ]);
    }

    function Confirm($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $confirm = $this->model("HoaDonModel");
            $confirm->delete($id);
        }
        return $this->redirectTo("DonHang", "Success");
    }

    function Success()
    {
        $this->view("layoutAdmin", [
            'page' => 'DonHang/success',
        ]);
    }

    function Error()
    {
        $this->view("layoutAdmin", [
            'page' => 'DonHang/error',
        ]);
    }
}
