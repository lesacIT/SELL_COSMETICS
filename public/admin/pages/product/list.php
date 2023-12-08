<?php
require_once '../../../../bootstrap.php';


use CNWeb\PROJECT\KhachHang;
use CNWeb\PROJECT\SanPham;

session_start();
if (isset($_SESSION["adminID"])) {
    $admin = new KhachHang($PDO);
    $admin->find($_SESSION["adminID"]);
} else {
    redirect("/admin/login.php");
}
$sanpham = new SanPham($PDO);
$ds = $sanpham->all();
?>

      <?php  require_once'../../compoinent/header.php'; ?>
      <div id="wrapper">
         <!-- Sidebar -->
         <?php  require_once'../../compoinent/danhmuc.php'; ?>
         <div id="content-wrapper">
            <div class="container-fluid">
               <!-- Breadcrumbs-->
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="#">Quản lý</a>
                  </li>
                  <li class="breadcrumb-item active">Sản phẩm</li>
               </ol>
               <!-- DataTables Example -->
               <div class="action-bar">
                  <a href="./add.php" class="btn btn-primary" style="margin-block: 30px;">
                <i class="fa fa-plus"></i> Thêm sản phẩm</a>
               </div>
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 
                                 <th>STT</th>
                                 <th style="width:50px">Tên Sản Phẩm </th>
								         <th>Hình ảnh</th>
                                 <th>Giá bán </th>
                                 <th style="text-align:center">Dung Tích/Khối Lượng</th>  
                                 <th style="text-align:center">Mô Tả</th>
                                 <th>Nhãn Hiệu</th>
                                 <th>Giới tính</th>
                                 <th>Loại Sản Phẩm</th>
                                 <th>Giảm giá</th>
                                 <th >Thao Tác</th>
                                 <th></th>
                              </tr>
                           </thead>
                              <?php
                                  $i = 1;
                               foreach ($ds as $sanpham) : ?>
                           <tbody>
                              <tr>
                           <th><?= $i++; ?></th>
                           <td><?= $sanpham->tensanpham ?></td>
                           
                            <td><img src="<?= "../../uploads/" . $sanpham->hinhanh ?>" alt="" style="width:100px; height: 100px;"></td>
                            <td><?= $sanpham->gia ?>đ</td>
                            <td style="text-align:center"><?= $sanpham->kichthuoc ?></td>
                            <td><?= $sanpham->mota ?></td>
                            <td><?= $sanpham->nhanhieu ?></td>
                            <td><?= $sanpham->gioitinh ?></td>
                            <td style="text-align:center"><?= $sanpham->getLoai_Id() ?></td>
                            <td style="text-align:center"><?= $sanpham->giamgia ?></td>
                            
                             <td >
                                <a href="<?= "./add.php?id=" . $sanpham->getId() ?>" class="btn btn-warning mb-2">Edit</a>
                                <form class="delete" action="<?= './add.php' ?>" method="POST" onsubmit="return allow()" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $sanpham->getId() ?>">
                                    <button type="submit" class="btn btn-xs btn-danger" name="delete-contact">
                                        Delete</button>
                                </form>
                            </td>
                              </tr>
                          
                            <?php endforeach?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
             <?php  require_once'../../compoinent/footer.php'; ?>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Đăng Xuất?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Bạn có muốn đăng xuất không</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                  <a class="btn btn-primary" href="../../dangxuat.php">Đăng Xuất</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="../../vendor/jquery/jquery.min.js"></script>
      <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="../../vendor/datatables/jquery.dataTables.js"></script>
      <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="../../js/sb-admin.min.js"></script>
      <!-- Demo scripts for this page-->
      <script src="../../js/demo/datatables-demo.js"></script>
      <script src="../../js/admin.js"></script>
       <script src="./js/script.js"></script>
      <script>
        function allow() {
            return confirm("Bạn có chắc muốn xoá");
        }
    </script>
   </body>
</html>

