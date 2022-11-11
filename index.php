
<?php 
    session_start();
    include "include/connection.php";
    if(isset($_SESSION['userID'])){
        include "include/user_data.php";
    } 
    if(isset($_POST['usernameInput']) && isset($_POST['passwordInput'])){
        $username = $_POST['usernameInput'];
        $password = md5($_POST['passwordInput']);

        $sql = "SELECT CUSTOMER_ID FROM CUSTOMER_ACCOUNT_TABLE WHERE USERNAME = '$username' AND PASSWORD = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                $_SESSION['userID'] = $row['CUSTOMER_ID'];
                header("location: index.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <section class="home-section">
        <div class="container border h-100 position-relative">
            <div class="content-group position-absolute top-50 start-0 translate-middle-y">
                <h3>Mischievous Vape Lounge</h3>
                <h1>LOREM IPSUM DOLOR </h1>
                <a href="#" class="btn btn-primary">Shop Now</a>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>