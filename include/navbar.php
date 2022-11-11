<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Mischievous Vape Lounge</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
    </div>
    <?php
        if(!isset($_SESSION['userID'])){
    ?>
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">
            <i class="bi bi-person"></i>
        </button>
    <?php
        }else{
    ?>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person"></i> <?php echo $firstname;?>
             </button>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="include/logout.php">Logout</a></li>
            </ul>
        </div>
    <?php   
        }
    ?>
        <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartCanvas" aria-controls="cartCanvas">
            <i class="bi bi-cart4"></i>
        </button>
  </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post">
            <h3>Login</h3>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usernameInput" name="usernameInput" placeholder="Username">
                <label for="usernameInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="Password">
                <label for="passwordInput">Password</label>
            </div>
            <div>
                <button class="btn btn-dark rounded-0"type="submit">Login</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="cartCanvas" aria-labelledby="cartCanvasLabel" style="width: fit-content;">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="cartCanvasLabel">CART</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <table class="table">
        <thead>
            <tr>
                <th colspan="3">ORDER</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(isset( $_SESSION['userID'])){
                $customer_id = $_SESSION['userID'];
                $sql = "SELECT * FROM CART_TABLE WHERE CUSTOMER_ID = '$customer_id'";
                $cart = $conn->query($sql);

                if ($cart->num_rows > 0) {
                    while($row = $cart->fetch_assoc()) {
                        $quantity = $row['QUANTITY'];
                        $total = $row['TOTAL'];
                        $product_id =  $row['PRODUCT_ID'];
                        $sql = "SELECT * FROM PRODUCT_TABLE WHERE PRODUCT_ID = '$product_id'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
            ?>
                            <tr>
                                <td><img src="image/image.jpg" alt=""></td>
                                <td>
                                    <h6><?php echo $row['PRODUCT_NAME'];?></h6></td>
                                <td>
                                        <input type="number" class="quantity" name="quantity" id="<?php echo $product_id;?>" min="1" max="<?php echo $row['PRODUCT_STOCKS']; ?>" value="<?php echo $quantity; ?>">
                                </td>
                                <td>PRICE</td>
                                <td>
                                    <button class="btn btn-dark btn-sm delete-cart" id="<?php echo $product_id;?>">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr> 
            <?php
                                }
                            }
                        }
                    }
                }
            ?>
        </tbody>
    </table>
  </div>
</div>