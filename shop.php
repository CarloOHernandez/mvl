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
                header("location: shop.php");
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include "include/navbar.php" ?>
    <div class="header border">
        <div class="container border h-100 position-relative">
            <div class="content-group position-absolute top-50 start-50 translate-middle">
                <h1 class="text-center">Shop</h1>
                <div class="hstack gap-3 ms-auto me-auto">
                <a href="home.php">Home</a>
                <div class="vr"></div>
                <a href="shop.php">Shop</a>
                </div>
            </div>
        </div>
    </div>

    <section class="product-section">
        <div class="container h-100 border">
            <div class="row mb-3">
                <div class="col border">
                    <div>
                        <button class="btn btn-primary">All Products</button>
                        <button class="btn btn-primary">1</button>
                        <button class="btn btn-primary">2</button>
                        <button class="btn btn-primary">3</button>
                        <button class="btn btn-primary">4</button>
                    </div>
                </div>
                <div class="col-4 border h-100">
                    <div class="input-group">
                        <span class="input-group-text" id="Search-Product"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="Search-Product">
                    </div>
                </div>
            </div>
            <div class="row productContainer">
                <?php 
                $sql = "SELECT * FROM PRODUCT_TABLE";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-3 mb-3">
                    <div class="card">
                        <img src="image/image.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $row['PRODUCT_NAME'];?></h6>
                            <p class="card-text">
                                <?php echo $row['PRODUCT_PRICE'];?>
                            </p>
                            <button class="btn btn-primary add-to-cart-btn" id="<?php echo $row['PRODUCT_ID'] . '-' .  $row['PRODUCT_PRICE'];?>"><i class="bi bi-cart-plus-fill"></i> Add to cart</button>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <script src="js/app.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>