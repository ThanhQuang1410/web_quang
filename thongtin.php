<?php
ob_start();
session_start();
include("connect.php");

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
    <div class="under">
        <div class="infor">
        <div class="container">
            <h3>OWNER</h3>
            <div class="avt">
                <img src="images/owner.JPG" alt="">
            </div>
            <p>TRẦN THANH QUANG</p>
            <P>B7-DS3</P>
            <p class="detail">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <div class="detail">
                <i class="fas fa-map-marker"></i>
                <p>TP. NAM ĐỊNH, TỈNH NAM ĐỊNH</p>
            </div>
            <div class="detail">
                <i class="fas fa-envelope"></i>
                <p>TTQUANG1410@GMAIL.COM</p>
            </div>
            <div class="detail">
                <i class="fas fa-mobile"></i>
                <p>0948831997</p>
            </div>
            <div class="detail">
                <i class="fab fa-facebook-square"></i>
                <p>THANH QUANG</p>
            </div>
        </div>
    </div>
    </div>
    <div class="coppyright">
        <div class="container">Copyrights@2018: TRAN THANH QUANG</div>
    </div>
    <div class="pop_up">
        <i class="fas fa-times exit"></i>
        <form action="">
            <label for="user">USER NAME:</label>
            <input type="text" id="user">
            <label for="pass">PASSWORD:</label>
            <input type="text" id="pass">
            <input type="submit" value="ĐĂNG NHẬP">
        </form>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="jquery/script.js"></script>
</body>

</html>
