<?php
    session_start();

    if(isset($_COOKIE['btnLogin'])){
        $id = $_COOKIE['btnLogin'];
        
        require_once './admin/connect/query.php';

        $sql = "SELECT * FROM users WHERE id='$id' limit 1";

        $result = $this->query($sql);

        // $number_rows= $this->num_rows($result);

        // if($number_rows == 1){
            $each = $this->get_data($result);

            $_SESSION['account'] = $each['account'];
            
            $_SESSION['password'] = $each['password'];
        // }
    }
    if(isset($_SESSION['account']) && isset($_SESSION['password'])){
        session_start();
        header('Location: ./index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Royal</title>
        <!-- Bootstrap -->
        <link href="./admin/build/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="./admin/build/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="./admin/build/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="./admin/build/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="./admin/build/vendors/animate.css/animate.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="./admin/build/css/custom.min.css" rel="stylesheet">
    </head>
    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>
            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form method="POST" action="process_login.php">
                            <h1>Đăng Nhập</h1>
                            <div>
                                <input type="text" class="form-control" name="account" placeholder="Tài khoản" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="" />
                            </div>
                            <div>
                                <input type="submit" class="btn btn-default submit" name="btnLogin" value="Đăng nhập">
                                <!-- <a class="btn btn-default submit" href="#" name="txtLogin" >Đăng nhập</a> -->
                                <a class="reset_pass" href="#">Quên mật khẩu?</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">Tạo tài khoản mới?
                                    <a href="#signup" class="to_register"> Đăng kí </a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                            </div>
                        </form>
                    </section>
                </div>
                <div id="register" class="animate form registration_form">
                    <section class="login_content">
                        <form method="POST" action="process_register.php" enctype="multipart/form-data">
                            <h1>Tạo tài khoản</h1>
                            <div>
                                <input type="text" class="form-control" name="fullname" placeholder="Họ tên..." required="" />
                            </div>
                            <div style="margin-bottom: 20px;">
                                <select class="form-control" name="gender">
                                    <option selected value="1">-- Chọn giới tính --</option>
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ..." required="" />
                            </div>
                            <div>
                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại..." required="" />
                            </div>
                            <div>
                                <input type="email" class="form-control" name="email" placeholder="Email..." required="" />
                            </div>
                            <div>
                                <input type="text" class="form-control" name="account" placeholder="Tài khoản..." required="" />
                            </div>
                            
                            <div>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu..." required="" />
                            </div>
                            <div>
                                <label>Upload Avatar</label>
                                <input type="file" name="avatar" required="" />
                            </div>

                            <div>
                                <input type="submit" name="btnRegister" class="btn btn-secondary " style="margin-left:  38%;" value="Đăng kí">
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <p class="change_link">Bạn đã có tài khoản?
                                    <a href="#signin" class="to_register"> Đăng nhập </a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                            </div>
                        </form>
                        <?php

                        ?>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>