<?php 
 
    session_start();

    require_once './admin/connect/query.php';

    $result = new Database();

    $tableName = 'orders';

    $cart = $_SESSION['cart'];


    $total_price = 0;

    date_default_timezone_set("Asia/Ho_Chi_Minh");

    $date = new DateTime();
    $created_date = $date->getTimestamp();
    $created_date = date_format($date,'Y/m/d H:i:s');

    $status = 1;

    $user_id = $_SESSION['id'];
    $name_receiver = $_POST['name_receiver'];
    $phone_receiver = $_POST['phone_receiver'];
    $address_receiver = $_POST['address_receiver'];

    
    // var_dump($created_date);
    // die();

    // $name_receiver = $_POST['name_receiver'];
    // echo $name_receiver;

    foreach($cart as $each){
        $total_price += ($each['price'] * $each['quantity']);
    }
    
    if(isset($_POST['btnOrder'])){
        // $params = [
        //     'user_id' => $_SESSION['id'],
        //     'name_receiver' => $_POST['name_receiver'],
        //     'phone_receiver' => $_POST['phone_receiver'],
        //     'address_receiver' => $_POST['address_receiver'],
        //     'created_date' => $created_date,
        //     'total' => $total_price,
        //     $status = 1
        // ];

        $sql = "INSERT INTO `orders`(`user_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `created_date`, `total`, `status`) VALUES( '$user_id' ,  '$name_receiver' ,  '$phone_receiver' ,  '$address_receiver' ,  '$created_date' ,  '$total_price' ,  '$status' )";
        $rows = $result->connect($sql);

        $sql = "SELECT max(id) FROM orders WHERE user_id = '$user_id' LIMIT 1";
        $rows = $result->connect($sql);
        $order_id = mysqli_fetch_array($rows)['max(id)'];

        foreach($cart as $product_id => $each){
            $quantity = $each['quantity'];
            $sql = "INSERT INTO `order_products`(`order_id`, `product_id`, `quantity`, `status`) VALUES( '$order_id' ,'$product_id' ,'$quantity' ,'$status' )";
            $result->connect($sql);
        }
        unset($_SESSION['cart']);
        header('location: ./index.php');
    }


?>