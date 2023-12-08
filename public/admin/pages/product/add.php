
<?php
require_once '../../../../bootstrap.php';

use CNWeb\PROJECT\KhachHang;
use CNWeb\PROJECT\SanPham;
use CNWeb\PROJECT\LoaiSanPham;
use CNWeb\PROJECT\ChiTietHoaDon;


session_start();
if (isset($_SESSION["adminID"])) {
    $admin = new KhachHang($PDO);
    $admin->find($_SESSION["adminID"]);
} else {
    redirect("../../login.php");
}

$sanpham = new SanPham($PDO);
$loaisanpham = new LoaiSanPham($PDO);
$chitiethoadon = new ChiTietHoaDon($PDO);

/* xóa sản phẩm  */
if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'])
    && ($sanpham->find($_POST['id'])) !== null
) {
    if (!empty($chitiethoadon->findIdSP($_POST["id"]))) {
        echo "<script>alert('Sản phẩm đang tồn tại trong đơn hàng')</script>";
        echo "<scrip>window.location.href = 'list.php'</script>";
    }
    $sanpham->removeImage();
    $sanpham->delete();
    echo "alert('Sản phẩm được xóa thành công')";
    redirect(BASE_URL_PATH . "admin/pages/product/list.php");
     
}


/* thêm sản phẩm  */
$ds = $loaisanpham->all();
$id = isset($_REQUEST['id']) ?
    filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT) : -1;

if ($id > 0)
    $sanpham->find($id);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sanpham->fill($_POST);
    if ($_FILES["img"]["name"] != '') {
        $sanpham->uploadImage($_FILES["img"]["name"], $_FILES["img"]["tmp_name"]);
    }
    if ($sanpham->validate()) {
        $sanpham->save();
        redirect(BASE_URL_PATH . "admin/pages/product/list.php");
    }

    $errors = $sanpham->getValidationErrors();
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
               <li class="breadcrumb-item active">Sản phẩm</li>
            </ol>
            <!-- /form -->
              <main>
        <h1 class="text-center"><?= $id < 0 ? "Thêm" : "Sửa" ?> sản phẩm</h1>
        <div class="row">
            <div class="col-4"></div>
            <form name="frm" id="frm" action="" method="post" class="col m-auto text-dark" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Tên sản phẩm: </label>
                    <input type="text" name="txtTenSanPham" class="form-control" placeholder="" value="<?= isset($sanpham->tensanpham) ? $sanpham->tensanpham : ''; ?>" />
                    <span class="text-danger">
                        <?= isset($errors["tensanpham"]) ? $errors["tensanpham"] : "" ?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="phone" class="font-weight-bold">Giá: </label>
                    <input type="number" name="nbGia" class="form-control" min="0" placeholder="" value="<?= isset($sanpham->gia) ? $sanpham->gia : ''; ?>" />
                    <span class="text-danger">
                        <?= isset($errors["gia"]) ? $errors["gia"] : "" ?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="phone" class="font-weight-bold">Dung Tích/Khối Lượng: </label>
                    <input type="text" name="txtKichThuoc" class="form-control" maxlen="255" id="phone" placeholder="" value="<?= isset($sanpham->kichthuoc) ? $sanpham->kichthuoc : ''; ?>" />
                    <span class="text-danger">
                        <?= isset($errors["kichthuoc"]) ? $errors["kichthuoc"] : "" ?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="phone" class="font-weight-bold">Nhãn hiệu: </label>
                    <input type="text" name="txtNhanHieu" class="form-control" maxlen="255" id="phone" placeholder="" value="<?= isset($sanpham->nhanhieu) ? $sanpham->nhanhieu : ''; ?>" />
                    <span class="text-danger">
                        <?= isset($errors["nhanhieu"]) ? $errors["nhanhieu"] : "" ?>
                    </span>
                </div>

                <div class="form-group">
                    <label for="phone" class="font-weight-bold">Giảm giá (theo %): </label>
                    <input type="number" name="nbGiamGia" class="form-control" min="0" value="<?= isset($sanpham->giamgia) ? $sanpham->giamgia : '0'; ?>" />
                    <span class="text-danger">
                        <?= isset($errors["giamgia"]) ? $errors["giamgia"] : "" ?>
                    </span>
                </div>


                <div class="form-group">
                    <label for="" class="font-weight-bold">Loại: </label>
                    <select class="custom-select" name="slLoai">
                        <option value="0" selected>--Chọn--</option>
                        <?php foreach ($ds as $loaisanpham) : ?>
                            <option value="<?= $loaisanpham->getId() ?>" <?= $loaisanpham->getId() == $sanpham->getLoai_Id() ? "selected" : ""  ?>><?= $loaisanpham->tenloai ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="text-danger">
                        <?= isset($errors["loai_id"]) ? $errors["loai_id"] : "" ?>
                    </span>
                </div>

                <label for="" class="font-weight-bold">Giới tính: </label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rdGioiTinh" id="inlineRadio1" value="Nam" <?= $sanpham->gioitinh == "Nam" ? "checked" : ""  ?>>
                    <label class="form-check-label" for="inlineRadio1">Nam</label>

                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rdGioiTinh" id="inlineRadio2" value="Nữ" <?= $sanpham->gioitinh == "Nữ" ? "checked" : ""  ?>>
                    <label class="form-check-label" for="inlineRadio2">Nữ</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rdGioiTinh" id="inlineRadio3" value="Unisex" <?= $sanpham->gioitinh == "Unisex" ? "checked" : ""  ?>>
                    <label class="form-check-label" for="inlineRadio3">Unisex</label>
                </div>
                <br><span class="text-danger">
                    <?= isset($errors["gioitinh"]) ? $errors["gioitinh"] : "" ?>
                </span>
                <div class="form-group">
                    <label for="img" class="font-weight-bold">Ảnh sản phẩm: </label><br>
                    <input type="file" name="img" id="img" value="" />
                    <span class="text-danger">
                        <?= isset($errors["hinhanh"]) ? $errors["hinhanh"] : "" ?>
                    </span>
                </div>


                <div class="form-group">
                    <label for="notes" class="font-weight-bold">Mô tả:</label>
                    <textarea name="txtMoTa" id="txtMoTa" class="form-control" placeholder="Nhập mô tả sản phẩm...."><?= isset($sanpham->mota) ? $sanpham->mota : ''; ?></textarea>
                    <span class="text-danger">
                        <?= isset($errors["mota"]) ? $errors["mota"] : "" ?>
                    </span>
                </div>

                <a href="./list.php" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Trở về</a>
                <button type="submit" name="btnSubmit" id="submit" class="btn btn-primary float-right"><?= $id < 0 ? "Thêm" : "Sửa" ?> sản phẩm</button>
            </form>
            <div class="col-4"></div>
        </div>

    </main>

            <script type="text/javascript" src="../../vendor/ckeditor/ckeditor.js"></script>
            <script>CKEDITOR.replace('description');</script>
            <!-- /form -->
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
               <div class="modal-body"> Bạn có muốn đăng xuất không</div>
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