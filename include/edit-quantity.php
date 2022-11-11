<?php 

session_start();
include "connection.php";
$user_id = $_SESSION['userID'];
$product_id  =  $_POST['product_id'];
$quantity = $_POST['quantity'];
$sql = "UPDATE CART_TABLE SET QUANTITY = $quantity WHERE PRODUCT_ID = '$product_id' AND CUSTOMER_ID = '$user_id'";

$conn->query($sql)

?>  