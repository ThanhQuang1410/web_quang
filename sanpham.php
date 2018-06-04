<?php
ob_start();
session_start();
    include("connect.php");

    $sql = "SELECT * FROM product";
    $product = mysqli_query($conn, $sql);

    if(isset($_POST['submit'])){
         if(isset($_POST['name']) && isset($_POST['password']) ){
             $name = $_POST['name'];
             $password = $_POST['password'];
             $sql = "SELECT * FROM user WHERE name = '$name' AND password='$password'";
             $login = mysqli_query($conn, $sql);
              if(mysqli_num_rows($login) == 1){
                $rowUser = mysqli_fetch_array($login);
                $_SESSION['id'] = $rowUser['id'];
                $_SESSION['name'] = $rowUser['name'];
                $_SESSION['password'] = $rowUser['password'];
            }
            else{
                echo "SAI TÀI KHOẢN HOẶC MẬT KHẨU";
            }

         }
    }
    if(isset($_POST['signout'])){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['password']);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hover.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="navigation container">
            <a href="#">
                   <img src="images/personal%20logo.png" alt="">
               </a>
            <ul>
                <li><a href="index.php" class="hvr-underline-from-left">TRANG CHỦ</a></li>
                <li><a href="sanpham.php" class="hvr-underline-from-left">SẢN PHẨM</a></li>
                <li><a href="thongtin.php" class="hvr-underline-from-left">THÔNG TIN</a></li>
                <li><a href="chinhsua.php" class="hvr-underline-from-left">CHỈNH SỬA</a></li>
                <?php
                if(isset($_SESSION['id']))
                {
                ?>
                <form action="index.php" method="post" class="signout">
                    <?php echo "Hello ".$_SESSION['name'] ?><input type="submit" name="signout" value="ĐĂNG XUẤT" />
                </form>
                <?php
                }else{
                ?>
                    <li><a class="hvr-underline-from-left sign_in">ĐĂNG NHẬP</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </header>
    <div class="banner_top"></div>
    <div class="list_product container">
        <h2>CÁC SẢN PHẨM</h2>
        <div class="list row">
            <?php while($rowProduct = mysqli_fetch_array($product))
            {
            ?>
            <div class="col-md-4 item">
                <a href="#" class="hvr-grow-shadow">
                    <img src="images/<?php echo $rowProduct["url"]; ?>" alt="">
                    <p class="name"><?php echo $rowProduct["name"]; ?></p>
                    <p class="id"><?php echo $rowProduct["id"]; ?></p>
                    <p class="price"><?php echo $rowProduct["price"]; ?> $</p>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="coppyright">
        <div class="container">Copyrights@2018: TRAN THANH QUANG</div>
    </div>
    <div class="pop_up">
        <i class="fas fa-times exit"></i>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <label for="user">USER NAME:</label>
            <input type="text" id="user" name="name">
            <label for="pass">PASSWORD:</label>
            <input type="password" id="pass" name="password">
            <input type="submit" value="ĐĂNG NHẬP" name="submit">
        </form>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="jquery/script.js"></script>
</body>

</html>
