

<?php 
require_once '../bootstrap.php';
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
                <p class="m-0">Liên Hệ</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Liên Hệ Với Bất Cứ Câu Hỏi Nào</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Tên Của Bạn"
                                required="required" data-validation-required-message="Vui lòng điền tên của bạn" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Email Của Bạn"
                                required="required" data-validation-required-message="Vui lòng điền email của bạn" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Vấn Đề"
                                required="required" data-validation-required-message="Vui lòng điền vấn đề" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Lời Nhắn"
                                required="required"
                                data-validation-required-message="Vui lòng điền lời nhắn"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Gửi Lời Nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Liên Hệ</h5>
                <p>Bạn có thể liên hệ trực tiếp thông qua địa chỉ bên dưới</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Địa Chỉ</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Phường Xuân Khánh, Quận Ninh Kiều, Cần Thơ</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>becosmetics@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+84 987654321</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php   require_once'../public/site/compoinent/footer.php'; ?>