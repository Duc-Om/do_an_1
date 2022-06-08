<?php

    session_start();

    $id = $_GET['id'];

    if(empty($_SESSION['cart'][$id])){

        require_once './admin/connect/query.php';

        $query = new Database();

        $result = $query->getByIdProducts($id);

        $each = mysqli_fetch_array($result);

        $_SESSION['cart'][$id]['photo'] = $each['photo'];

        $_SESSION['cart'][$id]['name'] = $each['name'];
        
        $_SESSION['cart'][$id]['price'] = $each['price'];
        
        $_SESSION['cart'][$id]['quantity'] = 1;


    }else{

        $_SESSION['cart'][$id]['quantity']++;
    }

    header('location: ./cart.php');
?>
