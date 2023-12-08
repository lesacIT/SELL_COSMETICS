<?php

use CNWeb\PROJECT\HoaDon;
use CNWeb\PROJECT\KhachHang;

require_once '../../../../bootstrap.php';
$hd = new HoaDon($PDO);
session_start();
if(isset($_SESSION["adminID"])){
      $admin = new KhachHang($PDO);
      $admin->find($_SESSION["adminID"]);
} else {
    redirect("/admin/login.php");
}
$khachHang = new KhachHang($PDO);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET["dangxuat"] == 1)
        redirect("/admin/dangxuat.php");
}

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'])
    && ($khachHang->find($_POST['id'])) !== null
) {
    if(!empty($hd->findKH($khachHang->getId()))){
        echo "<script>alert('Không thể xóa tài khoản')</script>";
        echo "<script>window.location.href = 'list.php'</script>";
    }
    $khachHang->delete();
    redirect(BASE_URL_PATH . "admin/pages/customer/list.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="./js/script.js"></script>
    <script>
        function allow() {
            return confirm("Bạn có chắc muốn xoá");
        }
    </script>
</html>

