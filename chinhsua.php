<?php
ob_start();
session_start();
    include("connect.php");
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }

    $sqlp = "SELECT * FROM product";
    $product = mysqli_query($conn, $sqlp);



    $sqlu = "SELECT * FROM user";
    $user = mysqli_query($conn, $sqlu);

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
    <title>Chỉnh sửa</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hover.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="index.php" method="post" class="signout">
                    <?php echo "Hello ".$_SESSION['name'] ?><input type="submit" name="signout" value="ĐĂNG XUẤT" />
                </form>
    <div class="box">
            
        <div class="side_bar">
            <ul>
                <li class="user">USERS</li>
                <li class="pro">PRODUCTS</li>
            </ul>
        </div>
        <div class="table_aside">
            <div class="user_edit active">
                <h1>LIST USERS</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>TÊN</th>
                        <th>PASSWORD</th>
                        <th>CHỈNH SỬA</th>
                    </tr>
                     <?php while($rowUser = mysqli_fetch_array($user))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rowUser["id"]; ?></td>
                        <td><?php echo $rowUser["name"]; ?></td>
                        <td><?php echo $rowUser["password"]; ?></td>
                        <td><a href="edit_user.php?id=<?php echo $rowUser["id"]; ?>&n=<?php echo $rowUser["name"]; ?>&p=<?php echo $rowUser["password"]; ?>">CHỈNH SỬA</a><a href="delete_user.php?p=<?php echo $rowUser["id"]; ?>">XÓA</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <a class="add" href="insert_user.php"><i class="fas fa-plus"></i></a>
            </div>
            <div class="product_edit">
                <h1>LIST PRODUCTS</h1>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>TÊN</th>
                        <th>GIÁ</th>
                        <th>ẢNH</th>
                        <th>CHỈNH SỬA</th>
                    </tr>
                     <?php while($rowProduct = mysqli_fetch_array($product))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rowProduct["id"]; ?></td>
                        <td><?php echo $rowProduct["name"]; ?></td>
                        <td><?php echo $rowProduct["price"]; ?> $</td>
                        <td><img src="images/<?php echo $rowProduct["url"]; ?>" alt=""></td>
                        <td><a href="edit_product.php?id=<?php echo $rowProduct["id"]; ?>&n=<?php echo $rowProduct["name"]; ?>&p=<?php echo $rowProduct["price"]; ?>&img=<?php echo $rowProduct["url"]; ?>">CHỈNH SỬA</a><a href="delete_product.php?p=<?php echo $rowProduct["id"]; ?>">XÓA</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <a class="add" href="insert_product.php"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="jquery/script.js"></script>
</body>

</html>
