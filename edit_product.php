<?php
    include("connect.php");

    $productId = $_GET['id'];
    $productName = $_GET['n'];
    $productPrice = $_GET['p'];
    $productUrl = $_GET['img'];


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

                $sql = "UPDATE product SET id = '$id', name= '$name', price = '$price', url = '$url' WHERE id = '$productId'";
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
    <title>Thêm product</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hover.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
</head>

<body>
    <form action="edit_product.php?id=<?php echo $productId ?>&n=<?php echo $productName ?>&p=<?php echo $productPrice ?>&img=<?php echo $productUrl ?>" method="post" class="edit_product" enctype="multipart/form-data">
       <h1>EDIT PRODUCT</h1>
        <label for="id">ID</label><input type="text" id="id" name="id" required="required" 
        value="<?php echo $productId ?>">
        <label for="name">TÊN</label><input type="text" id="name" name="name" required="required" 
        value="<?php echo $productName ?>">
        <label for="price">PRICE</label><input type="number" id="price" name="price" required="required" 
        value="<?php echo $productPrice ?>">
        <label for="image">IMAGE</label><input type="file" id="image" name="image" required="required"> 
        <button type="submit" name="submit">EDIT PRODUCT</button>
    </form>
</body>

</html>
