<?php 

session_start();
include "connection.php";
$user_id = $_SESSION['userID'];
$product_id  =  $_POST['product_id'];
$sql = "DELETE FROM CART_TABLE WHERE PRODUCT_ID = '$product_id' AND CUSTOMER_ID = '$user_id'";

$conn->query($sql)

?>