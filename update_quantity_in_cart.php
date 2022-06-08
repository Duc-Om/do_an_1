<?php

    session_start();

    $id = $_GET['id'];

    $type = $_GET['type'];

    if(isset($_SESSION['cart'][$id])){
        if($type === 'decrease'){

            if($_SESSION['cart'][$id]['quantity'] > 1){
    
                $_SESSION['cart'][$id]['quantity']--;
    
            }else{
                unset($_SESSION['cart'][$id]);
            }
    
        }else{
    
            $_SESSION['cart'][$id]['quantity']++;
    
        }
    }else{
        echo "id không tồn tại!!!";
    }

    header('location: ./cart.php');
?>

<!-- <script>alert('id')</script> -->