<?php
require_once '../bootstrap.php';
require_once'../public/site/compoinent/header.php';



use CNWeb\PROJECT\LoaiSanPham;
$loaisanpham = new LoaiSanPham($PDO);
$ds = $loaisanpham->all();

use CNWeb\PROJECT\SanPham;
$sanPham = new SanPham($PDO);
$danhSachSanPham = $sanPham->all();




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
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
               <?php require_once'../public/site/compoinent/danhmuc.php'; ?>
            </div>
            <div class="col-lg-9">



            <?php require_once'../public/site/compoinent/nav.php'; ?>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="./admin/uploads/banner.png" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">GIẢM GIÁ 10% ĐƠN HÀNG ĐẦU TIÊN CỦA BẠN</h4>
                                    <a href="" class="btn btn-light py-2 px-3">Mua Sắm Ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="./admin/uploads/banner 2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">GIẢM GIÁ 10% ĐƠN HÀNG ĐẦU TIÊN CỦA BẠN</h4>
                                    <a href="" class="btn btn-light py-2 px-3">Mua Sắm Ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản Phẩm Chất Lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn Phí Vận Chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hoàn Trả Hàng Trong 14 Ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ Trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Danh Mục Nổi Bật</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">5 Sản Phẩm</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" style="" src="./admin/images/1.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Đồ Trang Điểm</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">5 Sản Phẩm</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" style="" src="./admin/images/2.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Đồ Chăm Sóc Da</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">5 Sản Phẩm</p>
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" style="" src="./admin/images/3.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Đồ Chăm Sóc Tóc</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="./admin/images/Lipstick.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">GIẢM GIÁ 20% TẤT CẢ ĐƠN HÀNG</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Bộ Sưu Tập Son</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Mua Ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="./admin/images/Mascara.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">GIẢM GIÁ 20% TẤT CẢ ĐƠN HÀNG</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Mascara</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản Phẩm</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
          <?php foreach ($danhSachSanPham as $i => $sanPham) : 
          ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="admin/uploads/<?= $sanPham->hinhanh ?>" alt="" style="with:200px; height:300px">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?= $sanPham->tensanpham ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6> <?php echo number_format( $sanPham->gia ,0,',','.'); ?>đ</h6><h6 class="text-muted ml-2"><del><?php echo number_format( $sanPham->gia ,0,',','.'); ?>đ</del></h6>      
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="chitietsp.php?id=<?= $sanPham->getId() ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>

                        <a href="chitietsp.php?id=<?= $sanPham->getId() ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm Vào Giỏ</a>
                          
                    </div>
                </div>
            </div>
              <?php endforeach; ?>
            
        </div>
    </div>

 <?php   require_once'../public/site/compoinent/footer.php'; ?>






