<?php
session_start();
require_once '../bootstrap.php';

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
			$str = "shop.php";
			echo "<script>alert('Đã cập nhật số lượng sản phẩm!')</script>";
		
			 redirect("/shop.php");
		} else {

			$giohang->fill($_POST);
			if ($giohang->validate()) {
				$giohang->save();
				$str = "shop.php";
				echo "<script>alert('Thêm sản phẩm thành công!')</script>";
			
				 redirect("/shop.php");
			}
		}
	}
}

?>

   
		











