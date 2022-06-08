<?php

    require_once './admin/connect/query.php';

    $result = new Database();

    function check (){
        $check = true;
        if(empty($_POST['account'])){

            $check = false;

            echo "<script>alert('Tài khoản không được để trống!')</script>";

        }else if(empty($_POST['password'] || (strlen($_POST['password']) >= 6))){

            $check = false;

            echo "<script>alert('Mật khẩu không được để trống và độ dài phải lớn hơn hoặc bằng 6 kí tự')</script>";
            
        }

        return $check;
    }


    if(isset($_POST['btnLogin'])){
        if(check()){
            $user = $_POST['account'];

            $pass = $_POST['password'];

            $result->login($user,$pass);
        }
    }else{
        echo "K có gì"; 
    }

?>

