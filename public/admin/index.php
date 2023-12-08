<?php
require_once '../../bootstrap.php';



use CNWeb\PROJECT\KhachHang;

session_start();
if(isset($_SESSION["adminID"])){
      $admin = new KhachHang($PDO);
      $admin->find($_SESSION["adminID"]);
       redirect("./pages/product/list.php");
} else {
    redirect("../admin/login.php");
}





?>