<?php
require_once '../bootstrap.php';
require_once'../public/site/compoinent/header.php';
use CNWeb\PROJECT\SanPham;

require_once '../bootstrap.php';


use CNWeb\PROJECT\LoaiSanPham;
$loaisanpham = new LoaiSanPham($PDO);
$ds = $loaisanpham->all();

$sp = new SanPham($PDO);
if (!isset($_GET["id"]) || !$sp->find($_GET["id"])) {
    redirect("/");
} else {
    $sp->find($_GET["id"]);
}


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
                           <?php foreach ($ds as $loaisanpham) : ?>
                                <a href="" class="nav-item nav-link"><?= $loaisanpham->tenloai ?></a>
                           <?php endforeach ?>
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
                <p class="m-0">Chi Tiết</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5" >
        <div class="row px-xl-5">
            <div class="col-3"></div>
            <div class="col-lg-4 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="./admin/uploads/<?= $sp->hinhanh ?>" alt="Image" style="with:300px; height:400px">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./admin/uploads/<?= $sp->hinhanh ?>" alt="Image" style="with:300px; height:400px">
                        </div>
                        
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-5 pb-5 px-5  ">
                <h3 class="font-weight-semi-bold"><?= $sp->tensanpham ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Đánh giá)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4 pr-"><?php echo number_format( $sp->gia ,0,',','.'); ?>đ</h3>
                
                <div class="d-flex align-items-center mb-4 pt-2">
                    
                        <form method="POST" action="xulyhoadon.php">
                                <div class="input-group " style="width: 300px; display: flext">
                                   
                                    <input type="text" name="idKhachHang" id="idKhachHang" value="<?= isset($khachHang) ? $khachHang->getId() : '' ?>" hidden>
                                    <input type="text" name="idSanPham" id="idSanPham" value="<?= $sp->getId() ?>" hidden>
                                    
                                    
                                     <div class="input-group quantity mr-3 "style="width: 130px;">
                                         <div class="input-group-btn">
                                        <button class="btn btn-primary btn-minus" id="minus" type="button"><i class="fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                        </div>
                                    <input type="number" class="form-control bg-secondary text-center" min="1" max="100" size="3" value="1" name="nbSoLuong" >
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-plus" id="plus" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                        </div>
                                     </div>
                                </div>
                                <br>
                                <button class="btn btn-primary px-3" name="btnGioHang"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng</button> <br>
                                <br>
                                <button class="btn btn-primary px-3" name="btnMuaNgay">Mua ngay</button>
                            </form>
                
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô Tả</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Thông Tin</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh Giá (1)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Mô Tả Sản Phẩm</h4>
                        <p>
                            <?= $sp->mota ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Thông Tin Thêm</h4>
                        <p>

                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 đánh giá cho "<?= $sp->tensanpham ?>"</h4>
                                <div class="media mb-4">
                                    <img src="./admin/uploads/ava.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>Thu Thảo<small> - <i>16 Apr 2023</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Sản phẩm tốt</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Để Lại Đánh Giá</h4>
                                <small>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Đánh giá của bạn * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Nhận xét của bạn *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên của bạn *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email của bạn *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Đánh giá" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
   
    <!-- Products End -->


   <?php   require_once'../public/site/compoinent/footer.php'; ?>