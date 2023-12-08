<?php
require_once '../../../../bootstrap.php';
use CNWeb\PROJECT\LoaiSanPham;
use CNWeb\PROJECT\SanPham;
use CNWeb\PROJECT\KhachHang;

$loaisanpham = new LoaiSanPham($PDO);
$sp = new SanPham($PDO);

session_start();
if (isset($_SESSION["adminID"])) {
    $admin = new KhachHang($PDO);
    $admin->find($_SESSION["adminID"]);
} else {
    redirect("./list.php");
}

$loaisanpham = new LoaiSanPham($PDO);
$sp = new SanPham($PDO);

$id = isset($_REQUEST['id']) ?
    filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;
if ($id > 0)
    $loaisanpham->find($id);
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loaisanpham->fill($_POST);
    if ($loaisanpham->validate()) {
        $loaisanpham->save();
        redirect(BASE_URL_PATH . "../../../admin/pages/category/list.php");
    }

    $errors = $loaisanpham->getValidationErrors();
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
                  <li class="breadcrumb-item active">Danh mục</li>
               </ol>
               <!-- /form -->
               <form method="post" action="" enctype="multipart/form-data">
                  <div class="form-group row">
                     <label class="col-md-12 control-label" for="name">Tên</label>  
                     <div class="col-md-9 col-lg-6">
                        <input type="hidden" name="id" value="1" class="form-control">
                        <input type="text" name="txtTenLoai" class="form-control" maxlen="255" id="name" placeholder="Nhập vào tên loại" value="<?= isset($loaisanpham->tenloai) ? $loaisanpham->tenloai : ''; ?>" />                   
                        <div class="form-action">
                      <button type="submit" name="btnSubmit" id="submit" class="btn btn-primary float-right">Cập Nhật</button>
                        </div>
                     </div>
                  </div>
               
                   <span>
                        <?= isset($errors["tenloai"]) ? $errors["tenloai"] : "" ?>
                    </span>
                   
               </form>
               <!-- /form -->
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