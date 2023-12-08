
<?php
require_once '../bootstrap.php';

use CNWeb\PROJECT\SanPham;
if(isset($_SESSION["userID"])){
    
    $id = $_SESSION["userID"];
    $khachHang = new KhachHang($PDO);
    $khachHang->find($id);
    
}



$sp = new SanPham($PDO);
$flat = 0;



if (isset($_POST["txtSearch"])) {
    $flat = 1;
    $sanPham = new SanPham($PDO);
    $listSP = $sanPham->search($_POST["txtSearch"]);
}

use CNWeb\PROJECT\LoaiSanPham;
$loaisanpham = new LoaiSanPham($PDO);
$ds = $loaisanpham->all();


$sanPham = new SanPham($PDO);
$danhSachSanPham = $sanPham->all();


$sqlLSP = $PDO->query("SELECT DISTINCT tenloai FROM loaisanpham;");
require_once'../public/site/compoinent/header.php';




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
                <p class="m-0">Cửa Hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Lọc Theo Giá</h5>
                    <form action="" method="POST">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input checked "  id="price-all">
                            <label class="custom-control-label" for="price-all">Tất Cả Giá</label>
                            <span class="badge border font-weight-normal">24</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <label class="custom-control-label" for="price-1">0đ - 50000đ</label>
                            <span class="badge border font-weight-normal">0</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">50000đ - 100000đ</label>
                            <span class="badge border font-weight-normal">1</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">100000đ - 200000đ</label>
                            <span class="badge border font-weight-normal">21</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">200000đ - 500000đ</label>
                            <span class="badge border font-weight-normal">2</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">500000đ - 1000000đ</label>
                            <span class="badge border font-weight-normal">0</span>
                        </div>
                         
                        
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form  method="POST" action="shop.php">
                            <div class="input-group">
                                <input type="text" class="form-control " placeholder="Tìm kiếm sản phẩm..." name="txtSearch" >
                                <div class="input-group-append">    
                                        <button type="submit" class="input-group-text bg-transparent text-primary " id="basic-addon2" name="btnSearch">
                                        <i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                    </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sắp Xếp Theo
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Mới Nhất</a>
                                    <a class="dropdown-item" href="#">Phổ Biến Nhất</a>
                                    <a class="dropdown-item" href="#">Đánh Giá Tốt Nhất</a>
                                </div>
                            </div>
                        </div>
                    </div>

                      <?php if ($flat == 0) : ?>
                    <?php foreach ($danhSachSanPham as $i => $sanPham) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" src="admin/uploads/<?= $sanPham->hinhanh ?>" alt="" style="with:100px; height:300px">
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"><?= $sanPham->tensanpham ?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6><?php echo number_format( $sanPham->gia ,0,',','.'); ?>đ</h6><h6 class="text-muted ml-2"><del><?php echo number_format( $sanPham->gia ,0,',','.'); ?></del>đ</h6> 
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="chitietsp.php?id=<?= $sanPham->getId() ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>
                                   
                                   
                                    <form method="POST" action="xulyhoadon.php">
                                    
                                    <input type="text" name="idKhachHang" id="idKhachHang" value="<?= isset($khachHang) ? $khachHang->getId() : '' ?>" hidden>
                                    <input type="text" name="idSanPham" id="idSanPham" value="<?= $sp->getId() ?>" hidden>
                                    <input type="number" class="form-control bg-secondary text-center" min="1" max="100" size="3" value="1" name="nbSoLuong" hidden>
                                    
                                    
                                        <a href="chitietsp.php?id=<?= $sanPham->getId()  ?>"
                                        <button class="btn btn-sm text-dark p-0" name="btnGioHang"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button></a>
                                    
                                    </form>
                                    
                                    
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>
                     <?php else : ?>
                        <?php if ($listSP == null) : ?>
                                <img src="./admin/uploads/nosp.jpg" class="w-50 mx-auto row"> <br>   
                                <h5 class="text-danger m-auto mt-5">Không tìm thấy sản phẩm phù hợp với từ khóa <a href="shop.php" class="font-italic initialism">Tìm Kiếm với từ khóa khác</a></h5>
                        <?php else : ?>
                            <?php foreach ($listSP as $sanPham) : ?>
                                     <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                        <div class="card product-item border-0 mb-4">
                                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                                <img class="img-fluid w-100" src="admin/uploads/<?= $sanPham->hinhanh ?>" alt="">
                                            </div>
                                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                                <h6 class="text-truncate mb-3"><?= $sanPham->tensanpham ?></h6>
                                                <div class="d-flex justify-content-center">
                                                    <h6><?php echo number_format( $sanPham->gia ,0,',','.'); ?>đ</h6><h6 class="text-muted ml-2"><del><?php echo number_format( $sanPham->gia ,0,',','.'); ?></del>đ</h6>                                                    
                                                       
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-between bg-light border">
                                                <a href="chitietsp.php?id=<?= $sanPham->getId() ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>
                                                <form method="POST" action="themsp.php">
                                                
                                                <input type="text" name="idKhachHang" id="idKhachHang" value="<?= isset($khachHang) ? $khachHang->getId() : '' ?>" hidden>
                                                <input type="text" name="idSanPham" id="idSanPham" value="<?= $sp->getId() ?>" hidden>
                                                <input type="number" class="form-control bg-secondary text-center" min="1" max="100" size="3" value="1" name="nbSoLuong" hidden>
                                                
                                                       <a href="chitietsp.php?id=<?= $sanPham->getId()  ?>"
                                                    <button class="btn btn-sm text-dark p-0" name="btnGioHang"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button></a>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </div>
                             <?php endforeach; ?>
                          <?php endif; ?>
                    <?php endif; ?>
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                      
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-5 col-md-12 mb-5 pr-3 pr-xl-5">
                 <a href="../../index.php" class="text-decoration-none">
                    <img src="../../site/img/logo2.jpg" style="width: 100px">
                </a>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Phường Xuân Khánh, Quận Ninh Kiều, Cần Thơ</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>becosmetics@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+84 987654321</p>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Đường Dẫn Nhanh</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Trang Chủ</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Cửa Hàng</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Chi Tiết</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Giỏ Hàng</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Thanh Toán</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Liên Hệ</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Đăng Ký Để Nhận Tin Tức</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Tên Của Bạn" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Email Của Bạn"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Đăng Ký Ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Be Cosmetics</a>. Đã Đăng Ký Bản Quyền
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>