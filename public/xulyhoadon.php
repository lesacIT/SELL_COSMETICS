<?php

require_once '../bootstrap.php';
require_once'../public/site/compoinent/header.php';



use CNWeb\PROJECT\LoaiSanPham;
$loaisanpham = new LoaiSanPham($PDO);
$ds = $loaisanpham->all();



use CNWeb\PROJECT\ChiTietHoaDon;
use CNWeb\PROJECT\GioHang;
use CNWeb\PROJECT\HoaDon;
use CNWeb\PROJECT\SanPham;




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($_POST["idKhachHang"] == "") {
		var_dump($_POST);
		echo "<script>alert('Bạn chưa đăng nhập!')</script>";
		echo "<script>window.location = 'login.php'</script>";
	}

	$hoaDon = new HoaDon($PDO);
	$chiTiet = new ChiTietHoaDon($PDO);
	$sanpham = new SanPham($PDO);
	$giohang = new GioHang($PDO);
	$sanpham->find($_POST["idSanPham"]);

	if (isset($_POST["btnGioHang"])) {

		$_POST["sp_id"] = $_POST["idSanPham"];
		$_POST["kh_id"] = $_SESSION["userID"];
		$_POST["so_luong"] = $_POST['nbSoLuong'];

		if ($giohang->findKH_SP($_POST) !== NULL) {

			$giohang->so_luong += $_POST["so_luong"];
			$giohang->save();
			$str = "chitietsp.php?id=" . $_POST["idSanPham"];
			echo "<script>alert('Đã cập nhật số lượng sản phẩm!')</script>";
			echo "<script>window.location = '$str'</script>";
		} else {

			$giohang->fill($_POST);
			if ($giohang->validate()) {
				$giohang->save();
				$str = "chitietsp.php?id=" . $_POST["idSanPham"];
				echo "<script>alert('Thêm sản phẩm thành công!')</script>";
				echo "<script>window.location = '$str'</script>";
			}
		}
	}

	$sanpham->find($_POST["idSanPham"]);
	if ($sanpham->giamgia > 0) {
		$sanpham->gia = $sanpham->gia - ($sanpham->gia * ($sanpham->giamgia / 100));
	}


	$tien = ($sanpham->gia * $_POST["nbSoLuong"]);

	if (isset($_POST["btnXacNhan"])) {
		$hoaDon->fill($_POST["idKhachHang"], $tien);
		if ($hoaDon->validate()) {
			if ($hoaDon->save()) {
				$chiTiet->fill($_POST, $hoaDon->getId());
				$chiTiet->save();
				$str = "chitietsp.php?id=" . $_POST["idSanPham"];
				echo "<script>alert('Đặt hàng thành công!')</script>";
				echo "<script>window.location = '$str'</script>";
			}
		}
	}
} else {
	redirect("/");
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
		<main class="container d-flex flex-wrap justify-content-center">
			<div class="col-12 col-md-6" >
				<div class="border p-4">
						<h4 class="font-weigth-bold text-primary text-center font-weight-bold">THÔNG TIN ĐƠN HÀNG</h4>
						<img src="./admin/uploads/<?=$sanpham->hinhanh ?>" alt="" width="100%" height="400px">
						<h5 class="text mt-2"><?= $sanpham->tensanpham ?></h5>
						<p>Số lượng: <span class="font-italic font-weight-bold"><?= $_POST["nbSoLuong"] ?></span></p>
						<p>Giá: <span class="font-weight-bold"><?= $sanpham->gia?></span> (đã bao gồm giảm giá)</p>
						<h5>Thành tiền: <span class="font-weight-bold"><?= $tien ?></span></h5>
					<form method="POST" action="" >
					<div class="input-group ">
						<input type="text" name="idKhachHang" id="idKhachHang" value="<?= isset($khachHang) ? $khachHang->getId() : '' ?>" hidden>
						<input type="text" name="idSanPham" id="idSanPham" value="<?= $_POST["idSanPham"] ?>" hidden>
						<input type="number" name="nbSoLuong" value="<?= $_POST["nbSoLuong"] ?>" hidden>
					</div>
					<a class="btn btn-light " href="shop.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Thoát</a>
					<button class="btn btn-primary float-right" name="btnXacNhan" type="submit">Xác nhận đặt hàng</button>
					</form>
					</div>
			</div>
		</main>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?= BASE_URL_PATH . "js/jquery-3.6.1.min.js" ?>"></script>
	<script src="<?= BASE_URL_PATH . "js/main.js" ?>"></script>


 <?php   require_once'../public/site/compoinent/footer.php'; ?>






