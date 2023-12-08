<?php
require_once '../../../../bootstrap.php';
use CNWeb\PROJECT\SanPham;
use CNWeb\PROJECT\KhachHang;
use CNWeb\PROJECT\HoaDon;


session_start();
if(isset($_SESSION["adminID"])){
      $admin = new KhachHang($PDO);
      $admin->find($_SESSION["adminID"]);
} else {
    redirect("/admin/dangnhap.php");
}
$hoadon = new HoaDon($PDO);
$ds = $hoadon->all();
$khachhang = new KhachHang($PDO);
if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'])
    && ($hoadon->find($_POST['id'])) !== null
) {
    $hoadon->save();
    redirect(BASE_URL_PATH . "admin/pages/order/list.php");
}
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
                  <li class="breadcrumb-item active">Đơn hàng</li>
               </ol>
               <!-- DataTables Example -->
               <div class="action-bar">
                  <input type="submit" class="btn btn-danger btn-sm" value="Xóa" name="delete">
               </div>
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            							<thead>
            							  <tr>
                                    <th>
            								  <th scope="col">STT</th>
                                       <th scope="col">Tên khách hàng</th>
                                       <th scope="col">Ngày lập</th>
                                       <th scope="col">Trạng thái</th>
            							   </tr>
            							</thead>
            							<tbody>
            							   <tr>
                                     <?php
                                        $i = 1;
                                     foreach ($ds as $hoadon) : ?>
                                    <th></th>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $khachhang->find($hoadon->kh_id)->hoten ?></td>
                                    <td><?= $hoadon->ngaylap ?></td>
                                     <td><?= $hoadon->trangthai == 0 ? '<i class="text-secondary">Chờ xử lý...</i>' : '<i class="text-success font-weight-bold">Đã xác nhận</i>' ?></td>
                                    <td>
                                
                            </td>
                        </tr>
                    <?php endforeach ?>
            							   </tr>
            							  
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
   </body>
</html>

