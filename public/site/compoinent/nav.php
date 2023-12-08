
<?php

use CNWeb\PROJECT\KhachHang;
use CNWeb\PROJECT\SanPham;





if(isset($_SESSION["userID"])){
    
    $id = $_SESSION["userID"];
    $khachHang = new KhachHang($PDO);
    $khachHang->find($id);
    
}

$sanPham = new SanPham($PDO);
$danhSachSanPham = $sanPham->all();


?>

<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="index.php" class="nav-item nav-link">Trang Chủ</a>
            <a href="shop.php" class="nav-item nav-link">Cửa Hàng</a>
            <a href="cart.php" class="nav-item nav-link">Giỏ Hàng</a>
            <a href="contact.php" class="nav-item nav-link">Liên Hệ</a>
        </div>
        <?php if (isset($_SESSION["userID"])) : ?>
          <div class="navbar-nav ml-auto py-0">
            <a href="login.html" class="nav-item nav-link"><?php echo $khachHang->hoten?></a>
            <a href="../../dangxuat.php" class="nav-item nav-link">Đăng Xuất</a>
        </div>

          <?php else : ?>
        <div class="navbar-nav ml-auto py-0">
            <a href="./login.php" class="nav-item nav-link">Đăng Nhập</a>
            <a href="./sigin.php" class="nav-item nav-link">Đăng Ký</a>
        </div>
         <?php endif; ?>
    </div>
</nav>