<?php

    require_once './admin/connect/query.php';

    $result = new Database();

    $tableName = 'users';
    
    if(isset($_POST['btnRegister'])){

        // if(check()){

            $hasd_pasword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $params = [
                'name' => $_POST['fullname'],
                'gender' => $_POST['gender'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'account' => $_POST['account'],
                'password' => $hasd_pasword,
                'avatar' => $_FILES['avatar'],
                'roles_id' => 2
            ];

            if(file_exists($_FILES['avatar']['tmp_name'])){
                $params = array_merge($params,array('avatar'=>$result->upLoadFile('photo_avatar/','avatar')));
            }

            $result->Insert($tableName,$params);

            if($result == true){

                echo "<script>

                        alert('Đăng kí thành công');
                   
                        window.location.href='./login.php';

                    </script> ";

                

            }else {

                echo "<script>
                        alert('Đăng kí thất bại');

                        window.location.href='./login.php';
                        
                    </script>";

            }

        // }
    }
?>
