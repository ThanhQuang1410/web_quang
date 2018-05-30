<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])){
            if($_FILES['image']['type'] == "image/jpeg" 
                || $_FILES['image']['type'] == "image/png" 
                || $_FILES['image']['type'] == "image/gif"){

                $id = $_POST['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];

                $tmp = $_FILES['image']['tmp_name'];
                $url = $_FILES['image']['name'];

                move_uploaded_file($tmp, "images/".$url);

                 $sql = "INSERT INTO product (id, name, price, url)
                         VALUES ('$id', '$name', '$price', '$url')";
                 $product = mysqli_query($conn, $sql);
                 header("Location: chinhsua.php");      
            }
            else{
                echo "Kiểu file không hợp lệ";
            }
        }
    }



 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hover.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
</head>

<body>
    <form action="insert_product.php" class="insert_product" method="post" enctype="multipart/form-data">
       <h1>INSERT PRODUCT</h1>
        <label for="id">ID</label><input type="text" id="id" name="id">
        <label for="name">TÊN</label><input type="text" id="name" name="name">
        <label for="price">GIÁ</label><input type="number" id="price" name="price">
        <label for="image">IMAGE</label><input type="file" id="image" name="image">
        <button type="submit" name="submit">UPLOAD PRODUCT</button>
    </form>
</body>

</html>
