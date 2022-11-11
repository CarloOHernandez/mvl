<?php
session_start();
include "connection.php";
$user_id = $_SESSION['userID'];
$product_id  =  $_POST['product_id'];
$quantity = 1;
$price = $_POST['price'];

$total = $quantity * $price;

$sql = "INSERT INTO cart_table (CUSTOMER_ID, PRODUCT_ID, QUANTITY, TOTAL) VALUES ('$user_id ','$product_id',$quantity,$total)";
$conn->query($sql);
?>