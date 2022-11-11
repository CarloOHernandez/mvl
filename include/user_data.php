<?php

if(isset($_SESSION['userID'])){
    $user_id = $_SESSION['userID'];
    $sql = "SELECT * FROM CUSTOMER_TABLE INNER JOIN CUSTOMER_ADDRESS_TABLE ON CUSTOMER_TABLE.CUSTOMER_ID = CUSTOMER_ADDRESS_TABLE.CUSTOMER_ID WHERE CUSTOMER_TABLE.CUSTOMER_ID = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $firstname =  $row['FIRST_NAME'];
            $middlename =  $row['MIDDLE_NAME'];
            $lastname =  $row['LAST_NAME'];
            $birthdate =  $row['BIRTH_DATE'];
            $age =  $row['AGE'];
            $gender =  $row['GENDER'];
            $street =  $row['STREET'];
            $barangay   =  $row['BARANGAY'];
            $city =  $row['CITY'];
            $province =  $row['PROVINCE'];
        }
    }
}
?>