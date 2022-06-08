<?php

    require_once '../../connect/query.php';

    $result = new Database();

    $data = 'suppliers';

    // function check(){

    //     $check = true;

    //     if(empty($_POST['name'])){

    //         $check = false;

    //         echo "<script>alert('Tên nhà cung cấp không được để trống!')</script>";

    //     }else if(empty($_POST['address'])){

    //         $check = false;

    //         echo "<script>alert('Địa chỉ nhà cung cấp không được để trống!')</script>";

    //     }else if(empty($_POST['phone']) || (strlen($_POST['phone']) == 10)) {
            
    //         $check = false;

    //         echo "<script>alert('Số điện thoại nhà cung cấp không được để trống và độ dài phải bằng 10!')</script>";

    //     }else if(empty($_POST['email'])) {

    //         $check = false;

    //         echo "<script>alert('Email nhà cung cấp không được để trống!')</script>";

    //     }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

    //         $check = false;

    //         echo "<script>alert('Email nhà cung cấp chưa đúng định dạng!')</script>";

    //     }
    //     return $check;
    // }
    
    if (isset($_POST['btnAdd'])) {

        

        // if(check()){

            $params = [
            'name' => $_POST['name'],

            'address' => $_POST['address'],
    
            'phone' => $_POST['phone'],
    
            'email' => $_POST['email']
            ];

            $result->Insert($data,$params);

            if($result==true){
    
                echo "
        
                <script>
        
                    alert('Thêm thành công');
        
                    window.location.href='../suppliers/index.php';
        
                </script> ";
                
            }
            else echo "<script>alert('Thêm thất bại')</script>";

        // }
    }



    
?>

