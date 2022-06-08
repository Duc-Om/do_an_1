<?php

require_once '../../connect/query.php';

$query = new Database;

$id = $_GET['id'];

$status = $_GET['status'];

$sql = "UPDATE orders SET status='$status' WHERE id = '$id'";

$query->connect($sql);

header('location: ./index.php');

?>