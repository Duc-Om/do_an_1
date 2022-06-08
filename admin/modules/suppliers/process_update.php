<?php 
    require_once '../../connect/query.php';

    $result = new Database();

    $data = 'suppliers';

    
    
    if (isset($_POST['btnUpdate'])) {

            $id = $_POST['id'];

            $params = [
                
                'name' => $_POST['name'],

                'address' => $_POST['address'],
        
                'phone' => $_POST['phone'],
        
                'email' => $_POST['email']
            ];

            $result->Update($data,$params,$id);

            if($result==true){

                echo "
        
                <script>
        
                    alert('Sửa thành công');

                    window.location.href='../suppliers/index.php';
        
                </script> ";
                
            }
            else echo "<script>alert('Sửa thất bại')</script>";

    }

?>