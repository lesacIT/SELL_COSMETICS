
<?php
require_once '../bootstrap.php';


require_once'../public/site/compoinent/header.php';

use CNWeb\PROJECT\GioHang;
use CNWeb\PROJECT\SanPham;
use CNWeb\PROJECT\HoaDon;
use CNWeb\PROJECT\ChiTietHoaDon;

if(isset($_SESSION["userID"])){
     $giohang = new GioHang($PDO);
    $ds = $giohang->findKH($_SESSION["userID"]);
} else {
    redirect("../login.php");
}

$sanpham = new SanPham($PDO);
$hoadon = new HoaDon($PDO);
$chitiethoadon = new ChiTietHoaDon($PDO);

$dshd = $hoadon->findKH($_SESSION["userID"]);


?>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">Hỏi đáp</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Trợ giúp</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <img class="w-50" src="../../site/img/logo3.jpg">
            </div>
            <div class="col-lg-6 col-6 text-left">
               <?php require_once'../public/site/compoinent/search.php'; ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                            <a href="" class="nav-item nav-link">Đồ Trang Điểm</a>
                            <a href="" class="nav-item nav-link">Đồ Chăm Sóc Da</a>
                            <a href="" class="nav-item nav-link">Đồ Chăm Sóc Tóc</a>
                            <a href="" class="nav-item nav-link">Đồ Chăm Sóc Cơ Thể</a>
                            <a href="" class="nav-item nav-link">Đồ Chăm Sóc Cá Nhân</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
              <?php require_once'../public/site/compoinent/nav.php'; ?>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
     <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Be Cosmetics</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang Chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ Hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?= empty($ds) ? "<tr class='text-center'><td colspan='7'>Hiện tại bạn không có đơn hàng nào !</td></tr>" : "" ?>
                    <?php $i = 1;
                       
                        $sum=0;

                     foreach($ds as $giohang) : ?>
                        <tr>
                            <td class="align-middle"><img src="admin/uploads/<?= $sanpham->find($giohang->sp_id)->hinhanh ?>" alt="" style="width: 50px;"> <?= $sanpham->find($giohang->sp_id)->tensanpham ?></td>
                            <td class="align-middle"> 
                                <?php
                                $giasp = $sanpham->find($giohang->sp_id)->gia;
                                $giamgia = $sanpham->find($giohang->sp_id)->giamgia;
                                $giakm = ($giasp - ($giasp * $giamgia / 100));
                                echo number_format($giakm,0,',','.');
                                
                                ?>
                            
                               <?php  $sum += $giakm * $giohang->so_luong; ?>đ
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                      <input type="number" class="form-control form-control-sm bg-secondary text-center" min="1" max="100" size="3" value="<?= $giohang->so_luong ?>" name="nbSoLuong">      
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">            
                               <?php echo number_format($sum ,0,',','.'); ?>đ
                               
                            </td>
                              <form action="xulygiohang.php" onsubmit="return confirm('Bạn có chắc thực hiện thao tác')" name="xulygiohang" method="POST">
                            <input type="hidden" name="id" value="<?= $giohang->getId() ?>">
                            <td class="align-middle"><button name="delete" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                            </form>
                        </tr>
                    <?php  
                    
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Mã Giảm Giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Áp dụng mã</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tóm Tắt Giỏ Hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng tiền sản phẩm</h6>
                            <h6 class="font-weight-medium"> <?php echo number_format( $sum ,0,',','.'); ?>đ</h6>  
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">0đ</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng cộng</h5>
                            <h5 class="font-weight-bold"><?php echo number_format( $sum ,0,',','.'); ?>đ</h5>
                        </div>
                       

                    <form action="thanhtoansp.php" method="post" onsubmit="return confirm('Bạn có chắc muốn đặt tất cả sản phẩm')">
                        <input type="hidden" name="thanhtien" value="<?= $sum ?>">
                        <button class="btn btn-block btn-primary my-3 py-3" <?= empty($giohang->findKH($_SESSION["userID"])) ? "disabled" : "" ?>>Đi đến thanh toán</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


 <?php   require_once'../public/site/compoinent/footer.php'; ?>