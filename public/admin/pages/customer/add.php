<?php  
require_once '../../../../bootstrap.php';



use CNWeb\PROJECT\KhachHang;




$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$khachHang = new KhachHang($PDO);
	$khachHang->fill($_POST);
	if ($khachHang->validate()) {
		$khachHang->save() && redirect("list.php");
	}
	$errors = $khachHang->getValidationErrors();
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
                  <li class="breadcrumb-item active">Khách hàng</li>
               </ol>
               <!-- /form -->
               <div class="col-6 m-auto">
                    <form action="" id="frmLogin" class="p-4 border  " method="POST" >
                    <h3 class="text-center font-weight-bold">Thêm Người Dùng</h3>
                    <div class="form-group<?= isset($errors['txtUserFullName']) ? ' has-error' : '' ?>">
                        <label for="txtUserFullName">Họ tên</label>
                        <input type="text" name="txtUserFullName" class="form-control" id="txtUserFullName" placeholder="Nhập vào họ tên..." value="<?= isset($_POST['txtUserFullName']) ? htmlspecialchars($_POST['txtUserFullName']) : '' ?>" />
                        <?php if (isset($errors['txtUserFullName'])) : ?>
                            <span class="help-block">
                                <strong><?= htmlspecialchars($errors['txtUserFullName']) ?></strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <div class="form-group<?= isset($errors['email']) ? ' has-error' : '' ?>">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Nhập vào email..." value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" />

                        <?php if (isset($errors['email'])) : ?>
                            <span class="help-block">
                                <strong><?= htmlspecialchars($errors['email']) ?></strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <div class="form-group<?= isset($errors['sdt']) ? ' has-error' : '' ?>">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" name="sdt" class="form-control" id="sdt" placeholder="Nhập vào số điện thoại..." value="<?= isset($_POST['sdt']) ? htmlspecialchars($_POST['sdt']) : '' ?>" />

                        <?php if (isset($errors['sdt'])) : ?>
                            <span class="help-block">
                                <strong><?= htmlspecialchars($errors['sdt']) ?></strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <div class="form-group<?= isset($errors['dtBirthday']) ? ' has-error' : '' ?>">
                        <label for="dtBirthday">Ngày sinh</label>
                        <input type="date" name="dtBirthday" class="form-control" id="dtBirthday" value="<?= isset($_POST['dtBirthday']) ? htmlspecialchars($_POST['dtBirthday']) : '' ?>" />

                        <?php if (isset($errors['dtBirthday'])) : ?>
                            <span class="help-block">
                                <strong><?= htmlspecialchars($errors['dtBirthday']) ?></strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <div class="form-group<?= isset($errors['rdGender']) ? ' has-error' : '' ?>">
                        <label for="">Giới tính</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rdGender" value="Nam" <?php echo (isset($_POST['rdGender'])  && $_POST['rdGender']  == "Nam") ? "checked" : '' ?>>
                            <label class="form-check-label">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rdGender" value="Nữ"  <?php echo (isset($_POST['rdGender'])  && $_POST['rdGender']  == "Nữ") ? "checked" : '' ?>>
                            <label class="form-check-label">
                                Nữ
                            </label>
                        </div>

                        <?php if (isset($errors['rdGender'])) : ?>
                            <span class="help-block">
                                <strong><?= htmlspecialchars($errors['rdGender']) ?></strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <div class="form-group<?= isset($errors['txtAddress']) ? ' has-error' : '' ?>">
                        <label for="txtAddress">Địa chỉ</label>
                        <input type="text" name="txtAddress" class="form-control" id="txtAddress" value="<?= isset($_POST['txtAddress']) ? htmlspecialchars($_POST['txtAddress']) : '' ?>" />

                        <?php if (isset($errors['txtAddress'])) : ?>
                            <span class="help-block">
                                <strong><?= htmlspecialchars($errors['txtAddress']) ?></strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <div class="form-group<?= isset($errors['pwdUser']) ? ' has-error' : '' ?>">
                        <label for="pwdUser">Mật khẩu</label>
                        <input type="password" name="pwdUser" class="form-control" id="pwdUser" value="<?= isset($_POST['pwdUser']) ? htmlspecialchars($_POST['pwdUser']) : '' ?>" />

                        <?php if (isset($errors['pwdUser'])) : ?>
                            <span class="help-block">
                                <strong><?= htmlspecialchars($errors['pwdUser']) ?></strong>
                            </span>
                        <?php endif ?>
                    </div>

                    <div class="form-group<?= isset($errors['re_pwdUser']) ? ' has-error' : '' ?>">
                        <label for="re_pwdUser">Nhập lại mật khẩu</label>
                        <input type="password" name="re_pwdUser" class="form-control" id="re_pwdUser" value="<?= isset($_POST['re_pwdUser']) ? htmlspecialchars($_POST['re_pwdUser']) : '' ?>" />

                        <?php if (isset($errors['re_pwdUser'])) : ?>
                            <span class="help-block">
                                <strong><?= htmlspecialchars($errors['re_pwdUser']) ?></strong>
                            </span>
                        <?php endif ?>
                    </div>
                    <button type="submit" class="btn btn-primary my-2 w-100" name="btnLogout">Thêm</button>
                </form>
               <!-- /form -->
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
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
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