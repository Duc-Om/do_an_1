<?php
    require_once '../../connect/query.php';

    $query = new Database();

    $data = 'suppliers';

    $result = $query->Delete($data,$_GET['id']);

    if($result){

        echo "

        <script>

            alert('Xóa thành công');

            window.location.href='../suppliers/index.php';

        </script> ";
        
    }
    else echo "<script>alert('Xóa thất bại')</script>";

?>