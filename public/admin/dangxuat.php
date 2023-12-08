<?php 
require_once "../../bootstrap.php";
session_start();
if(isset($_SESSION["adminID"])){
    unset($_SESSION["adminID"]);
    echo "<script>alert('Đăng xuất thành công!')</script>";
    echo "<script>window.location = '../admin/dangxuat.php'</script>";
    session_destroy();
    header('location:login.php');
} else {
    echo "Không thể đăng xuất";
}









?>