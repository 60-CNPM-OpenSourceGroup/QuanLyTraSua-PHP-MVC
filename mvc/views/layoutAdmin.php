<!-- @{
    Layout = null;
    var session = (BTNHOM_QLTS.Common.UserLogin)Session[BTNHOM_QLTS.Common.CommonConstants.USER_SESSION];
    string avatar = "/images/" + session.Avatar;
} -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang chủ</title>
    <base href="<?php echo BASE; ?>">
    <!-- Custom fonts for this template-->
    <link href="public/admin/Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9315670d89.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href="public/admin/Admin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .tabA {
            text-decoration: none !important;
        }

        .grid-footer {
            color: #000;
            text-align: center;
            font-weight: bold;
        }

            .grid-footer a {
                background-color: #fefeff;
                color: blue;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                padding: 1px 10px 2px 10px;
            }

                .grid-footer a:active {
                    background-color: #fefeff;
                    color: #FFAD33;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i style="font-size: 32px;" class="fas fa-mug-hot"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HOMITA</div>
            </div>



            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <span>Trang chủ</span>
                    </span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="tabA" href="login/logout">
                    <span class="nav-link">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <span>Test Đăng xuất</span>
                    </span>
                </a>
            </li>  
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Cửa hàng
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="tabA collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <span class="nav-link">
                        <i class="fas fa-coffee"></i>
                        <span>Danh mục</span>
                    </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Đồ uống</a>
                        <a class="collapse-item" href="#">Loại đồ uống</a>
                        <a class="collapse-item" href="#">Topping</a>
                        <a class="collapse-item" href="#">Loại topping</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Đơn đặt hàng</span>
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Đơn tại quầy</span>
                    </span>

                </a>
            </li>

            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fas fa-cash-register"></i>
                        <span>Order tại quầy</span>
                    </span>

                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Khách hàng
            </div>
            <!-- Nav Item -  Phản hồi-->
            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fa fa-comments"></i>
                        <span>Phản hồi</span>
                    </span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Thống kê
            </div>

            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <span>Theo sản phẩm</span>
                    </span>

                </a>
            </li>
            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <span>Theo hình thức KD</span>
                    </span>

                </a>
            </li>
            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Theo tháng</span>
                    </span>

                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Người dùng
            </div>

            <!-- Nav Item - Thông tin nhân viên -->
            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fa fa-users"></i>
                        <span>Thông tin nhân viên</span>
                    </span>
                </a>
            </li>

            <!-- Nav Item - Tài khoản nhân viên -->
            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fa fa-user-circle"></i>
                        <span>Tài khoản nhân viên</span>
                    </span>
                </a>
            </li>

            <!-- Nav Item - Nhóm nhân viên -->
            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fa fa-users"></i>
                        <span>Nhóm nhân viên</span>
                    </span>
                </a>
            </li>

            <!-- Nav Item - Phân quyền -->
            <li class="nav-item">
                <a class="tabA" href="#">
                    <span class="nav-link">
                        <i class="fa fa-puzzle-piece"></i>
                        <span>Phân quyền</span>
                    </span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h2 style="color: red; margin-left: auto; font-weight:600">Trà sữa Homita</h2>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-shopping-cart" style=" color: #4e73df"></i><span style=" color: red">&nbsp;(0)</span> 
                            </a>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">@session.UserName</span>
                                <img class="img-profile rounded-circle"
                                     src="@avatar">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông tin tài khoản
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đổi mật khẩu
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php require_once "./mvc/views/admin_pages/".$data['page'].".php" ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; @DateTime.Now.Year</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn thật sự muốn kết thúc phiên làm việc hiện tại của mình.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="#">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="public/admin/Admin/vendor/jquery/jquery.min.js"></script>
    <script src="public/admin/Admin/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/admin/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="public/admin/Admin/js/sb-admin-2.min.js"></script>


    <script src="public/html2pdf.bundle.min.js"></script>
    <script src="public/jquery.table2excel.js"></script>

    <!-- @RenderSection("scripts", required: false)
    @RenderSection("styles", required: false) -->
</body>
</html>
