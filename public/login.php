<?php  
require_once "../bootstrap.php";
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    
    if (!$_POST['email']) {
        $errors["email"] = "Bạn chưa nhập email!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email không hợp lệ!";
    } else {
        $errors["email"] = "";
    }
    if (!$_POST['pwdUser']) {
        $errors["pwdUser"] = "Bạn chưa nhập mật khẩu!";
    } else if (strlen($_POST['pwdUser']) < 8) {
        $errors["pwdUser"] = "Mật khẩu không hợp lệ!";
    } else {
        $errors["pwdUser"] = "";
    }
    if ($errors["email"] == "" &&  $errors["pwdUser"] == "") {
        $sql = $PDO->prepare("select * from khachhang where email = ? and matkhau = ? and vai_tro = 0");
        $sql->execute([
            $_POST['email'],
            md5($_POST['pwdUser'])
        ]);
        if ($sql->rowCount() > 0) {
            $result = $sql->fetch();
            session_start();
            $_SESSION["userID"] = $result["id"];
            
            redirect('/');
        } else {
            $errors["invalid"] = "Email hoặc mật khẩu không chính xác!";
        }
    }
}

require_once'../public/site/compoinent/header.php';
?>




    <div class="main">
        <div class="container py-5 px-5">
                <div class="row">
                        <div class="col-8 text-center">
                            <img class="img-fluid" src="../admin/uploads/form.jpg" width="500">
                        </div>
                        <div class="col-4 text-dark">
                            <div class="container bg-light border rounded shadow-lg">
                        <form action="" id="frmLogin" class="p-2" method="POST">
                            <h3 class="text-center font-weight-bold text-primary">ĐĂNG NHẬP</h3>
                            <?php if (isset($errors["invalid"])) : ?>
                                <span class="help-block">
                                    <strong><?= $errors["invalid"] ?></strong>
                                </span>
                            <?php endif ?>
                            <div class="form-group py-3">
                                <label for="">Gmail: </label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo (isset($_POST["email"])) ?  $_POST["email"] : ""; ?>">
                                <?php if (isset($errors["email"])) : ?>
                                    <span class="help-block">
                                        <strong><?= $errors["email"] ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                            <div class="form-group py-3">
                                <label for="">Mật khẩu: </label>
                                <input type="password" class="form-control" name="pwdUser" id="pwdUser" value="<?php echo (isset($_POST["pwdUser"])) ?  $_POST["pwdUser"] : ""; ?>">
                                <?php if (isset($errors["pwdUser"])) : ?>
                                    <span class="help-block">
                                        <strong><?= $errors["pwdUser"] ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>


                            <button type="submit" class="btn btn-primary my-2 w-100" name="btnDangNhap">Đăng nhập</button>

                        </form>
                        <div class="text-align-end">
                            <p class="text-center py-2">Bạn chưa có tài khoản? <a href="./sigin.php">Đăng ký ngay</a></p>
                        </div>
                            </div>
                            
                        </div>
                </div>    
            </div>
        </div>
    </div>

 
   
 <?php   require_once'../public/site/compoinent/footer.php'; ?>




    
