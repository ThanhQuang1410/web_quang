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
                <div class="row bg">
                    <div class="col-md-4 left">
                        <div class="avt">
                            <img src="images/owner.JPG" alt="">
                        </div>
                        <h3>TRẦN THANH QUANG</h3>
                        <div class="row control">
                            <div class="col-md-4">
                                <b>D.O.B:</b>
                            </div>
                            <div class="col-md-8">
                                14th Oct, 1997
                            </div>
                        </div>
                        <div class="row control">
                            <div class="col-md-4">
                                <b>Address:</b>
                            </div>
                            <div class="col-md-8">
                                Nam Dinh city
                            </div>
                        </div>
                        <div class="row control">
                            <div class="col-md-4">
                                <b>Phone:</b>
                            </div>
                            <div class="col-md-8">
                                0948.83.1997
                            </div>
                        </div>
                        <div class="row control">
                            <div class="col-md-4">
                                <b>Email: </b>
                            </div>
                            <div class="col-md-8">
                                ttquang1410@gmail.com
                            </div>
                        </div>
                        <div class="social">
                            <div>
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <p>fb.com/Quaz2</p>
                            <div>
                                <i class="fab fa-instagram"></i>
                            </div>
                            <p>@t.h.a.n.h.q.u.a.n.g</p>
                        </div>
                    </div>
                    <div class="col-md-8 right">
                        <div class="about">
                            <h2>ABOUT ME</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                        <div class="about">
                            <h2>EDUCATION</h2>
                            <div class="row control">
                                <div class="col-md-2">
                                    <b>2015-2018:</b>
                                </div>
                                <div class="col-md-10">
                                    PEOPLE'S SERCURITY ACADEMY
                                </div>
                            </div>
                            <div class="row control">
                                <div class="col-md-2">
                                    <b>2015-2018:</b>
                                </div>
                                <div class="col-md-10">
                                    PEOPLE'S SERCURITY ACADEMY
                                </div>
                            </div>
                        </div>
                        <div class="about">
                            <h2>EXPERIENCES</h2>
                            <div class="row control">
                                <div class="col-md-2">
                                    <b>2017-2018:</b>
                                </div>
                                <div class="col-md-10">
                                    <div><b>VNPT COPR</b></div>
                                    <div>INTERN</div>
                                </div>
                            </div>
                            <div class="row control">
                                <div class="col-md-2">
                                    <b>2018-NOW:</b>
                                </div>
                                <div class="col-md-10">
                                    <div><b>GEMISOFT COMP.</b></div>
                                    <div>FRONT-END DEV</div>
                                </div>
                            </div>
                        </div>
                        <div class="about">
                            <h2>SKILLS</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    HTML/CSS
                                                </div>
                                                <div class="col-md-7">
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    JAVASCRIPT/JQUERY
                                                </div>
                                                <div class="col-md-7">
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    ENGLISH
                                                </div>
                                                <div class="col-md-7">
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    PHOTOSHOP
                                                </div>
                                                <div class="col-md-7">
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    ILLUSTRATOR
                                                </div>
                                                <div class="col-md-7">
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    ADOBE XD
                                                </div>
                                                <div class="col-md-7">
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span class="special"></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="about">
                            <h2>ACHIVEMENTS</h2>
                            <p>EARN ALOT OF MONEY FROM DESGIN AND CODING WEBSITE</p>
                        </div>
                        <div class="about"></div>
                    </div>
                </div>
                
            </div>
        </div>
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
