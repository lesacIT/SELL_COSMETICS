<?php
require_once '../../../../bootstrap.php';
use CNWeb\PROJECT\LoaiSanPham;
use CNWeb\PROJECT\SanPham;
use CNWeb\PROJECT\KhachHang;

$loaisanpham = new LoaiSanPham($PDO);
$sp = new SanPham($PDO);

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'])
    && ($loaisanpham->find($_POST['id'])) !== null
) {
    if(!empty($sp->findLoaiSP($loaisanpham->getId()))){
        echo "<script>alert('Không thể xóa loại sản phẩm này! Một số sản phẩm đang thuộc loại sản phẩm bạn đang muốn xóa')</script>";
        echo "<script>window.location.href = 'list.php'</script>";
    }
    $loaisanpham->delete();
    redirect(BASE_URL_PATH . "admin/pages/category/list.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link rel="stylesheet" href="./admin/css/sb-admin.css">
</head>
<body>
    <a href="../bootstrap.php" style=""></a>
    <div></div>

</body>
</html>