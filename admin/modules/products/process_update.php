<?php 
    require_once '../../connect/query.php';

    $result = new Database();

    $data = 'products';
    
    if (isset($_POST['btnSubmit'])) {

        $id = $_POST['id'];

        $params = [
            'name' => $_POST['name'],
            // 'quantity' => $_POST['quantity'],
            'price' => $_POST['price'],
            'discount' => $_POST['discount'],
            // 'photo' => $_POST['photo'],
            'suppliers_id' => $_POST['suppliers_id']
        ];
        
        $result->Update($data,$params,$id);

        if($result==true){

            echo "
    
            <script>
    
                alert('Sửa thành công');

                window.location.href='../products/index.php';

            </script> ";
            
        }
        else echo "<script>alert('Sửa thất bại')</script>";

    }

?>
