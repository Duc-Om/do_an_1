<?php

    require_once '../../connect/query.php';

    $result = new Database();

    $data = 'products';
    
    if (isset($_POST['btnSubmit'])) {
                
                $params = [

                    'name' => $_POST['name'],
        
                    // 'quantity' => $_POST['quantity'],
        
                    'price' => $_POST['price'],
        
                    'discount' => $_POST['discount'],
        
                    'photo' => $_FILES['photo'],
        
                    'description' => $_POST['description'],
        
                    'suppliers_id' => $_POST['suppliers_id']
                ];
                
                if(file_exists($_FILES['photo']['tmp_name'])){
                    $params = array_merge($params, array('photo'=>$result->upLoadFile('photo_products/','photo')));
                }
                $result = $result->Insert($data,$params);
            
                if($result==true){
    
                    echo "
            
                    <script>
            
                        alert('Thêm thành công');

                        window.location.href='../products/index.php';
            
                    </script> ";
                    
                }
                else echo "<script>alert('Thêm thất bại')</script>";

    }
?>