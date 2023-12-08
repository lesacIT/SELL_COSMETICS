<?php  
require_once '../bootstrap.php';



use CNWeb\PROJECT\KhachHang;

require_once "../bootstrap.php";


$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$khachHang = new KhachHang($PDO);
	$khachHang->fill($_POST);
	if ($khachHang->validate()) {
		$khachHang->save() && redirect("login.php");
	}
	$errors = $khachHang->getValidationErrors();
}


?>


<?php require_once'../public/site/compoinent/header.php'; ?>

    <div class="main">
        <div class="container py-5 px-5">
                <div class="row">
                        <div class="col-8 text-center">
                            <img class="img-fluid" src="../admin/uploads/form.jpg" width="600">
                        </div>
                        <div class="col-4 text-dark">
                            <div class="container bg-light border rounded shadow-lg">
                 <form action="" id="frmLogin" class="p-4 border" method="POST">
                    <h3 class="text-center font-weight-bold">ĐĂNG KÝ</h3>
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
                    <button type="submit" class="btn btn-primary my-2 w-100" name="btnLogout">Đăng ký</button>
                </form>
                            </div>
                            
                        </div>
                </div>    
            </div>
        </div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 <?php   require_once'../public/site/compoinent/footer.php'; ?>
