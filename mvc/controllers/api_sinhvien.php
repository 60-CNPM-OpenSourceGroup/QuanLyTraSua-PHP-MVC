<?php
// class API_SinhVien extends Controller{ 
//     public function DanhSach(){
//         $sinhvien = $this->model("sinhvienmodel");
//         $sv = $sinhvien->SinhVien();
//         $arr = array();

//         while($s = mysqli_fetch_array($sv)){
//             array_push($arr, new SinhVien(
//                 $s["id"], 
//                 $s["hoten"], 
//                 $s["namsinh"]
//             ));
//         }
//         echo json_encode($arr);
//     }
// }
// class SinhVien{
//     public $id;
//     public $hoten;
//     public $namsinh;

//     public function __construct($id, $hoten, $namsinh)
//     {
//         $this->id = $id;
//         $this->hoten = $hoten;
//         $this->namsinh = $namsinh;
//     }
// }
?>