<?php 
require_once '../../bootstrap.php';

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
        $sql = $PDO->prepare("select * from khachhang where email = ? and matkhau = ? and vai_tro = 1");
        $sql->execute([
            $_POST['email'],
            md5($_POST['pwdUser'])
        ]);
        if ($sql->rowCount() > 0) {
            $result = $sql->fetch();
            session_start();
            $_SESSION["adminID"] = $result["id"];
           
            redirect('../admin/pages/product/list.php');
        } else {
            $errors["invalid"] = "Email hoặc mật khẩu không chính xác!";
        }
    }
}
require_once'../site/compoinent/header.php';
 ?>


   

    <div class="main">
        <div class="container py-5 px-5">
                <div class="row">
                        <div class="col-8 text-center">
                            <img class="img-fluid" src="../admin/uploads/form.jpg"width="500">
                        </div>
                        <div class="col-4 text-dark">
                            <div class="container bg-light border rounded shadow-lg">
                                <h4 class="py-4 text-uppercase text-center font-weight-bold">Đăng nhập QTV</h4>
                               <form id="frmLogin"  method="POST">
                                <div class="mb-3 mt-3 py-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder=" ">
                                </div>
                                <?php if (isset($errors["invalid"])) : ?>
                                        <span class="help-block">
                                            <strong><?= $errors["invalid"] ?></strong>
                                        </span>
                                    <?php endif ?>
                                <div class="mb-3 py-3">
                                <label for="pwd">Mật khẩu:</label>
                                <input type="password" class="form-control" name="pwdUser" id="pwdUser" >
                                </div>
                                <div class="form-check mb-3">
                                
                                </div>
                                <?php if (isset($errors["pwdUser"])) : ?>
                                        <span class="help-block">
                                            <strong><?= $errors["pwdUser"] ?></strong>
                                        </span>
                                    <?php endif ?>
                                <button type="submit" class="btn btn-primary my-3 w-100"name="btnDangNhap" >Đăng nhập</button>
                            </form>
                            </div>
                            
                        </div>
                </div>    
            </div>
        </div>
    </div>    

<?php 
 require_once'../site/compoinent/footer.php';
 ?>