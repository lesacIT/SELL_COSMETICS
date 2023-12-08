<?php
require_once '../../../../bootstrap.php';
use CNWeb\PROJECT\SanPham;
use CNWeb\PROJECT\KhachHang;


session_start();
if (isset($_SESSION["adminID"])) {
    $admin = new KhachHang($PDO);
    $admin->find($_SESSION["adminID"]);
} else {
    redirect("../../login.php");
}
$sanpham = new SanPham($PDO);
$khachhang = new KhachHang($PDO);
$ds = $khachhang->allKH();

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
                  <li class="breadcrumb-item active">Khách hàng</li>
               </ol>
               <!-- DataTables Example -->
               <div class="action-bar">
                  <a href="../customer/add.php"><input type="submit" class="btn btn-primary btn-sm" value="Thêm" name="add"></a>
               </div>
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
							<thead>
							   <tr>
                           <th><input type="checkbox" onclick="checkAll(this)"></th>
								  <th>Tên </th>
								  <th>Email</th>
								  <th>Số điện thoại</th>
                          <th>Giới tính</th>
                          <th>Địa chỉ</th>
                          <th>Tên người nhận</th>
                          <th>Thao Tác</th>
                          <th></th>
								  <th></th>
								  <th></th>
							   </tr>
							</thead>
							<tbody>
							  
                        <?php
                    $i = 1;
                    foreach ($ds as $khachhang) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $khachhang->hoten ?></td>
                            <td><?= $khachhang->email ?></td>
                            <td><?= $khachhang->ngaysinh ?></td>
                            <td><?= $khachhang->gioitinh ?></td>
                            <td><?= $khachhang->sdt ?></td>
                            <td><?= $khachhang->diachi ?></td>
                            <td>
                                <form class="delete" action="<?= './delete.php' ?>" method="POST" onsubmit="return allow()" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $khachhang->getId() ?>">
                                    <button type="submit" class="btn btn-xs btn-danger" name="delete-contact">
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
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

