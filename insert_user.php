<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['password'])){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        $sql = "INSERT INTO user (id, name, password)
            VALUES ('$id', '$name', '$password')";
        $user = mysqli_query($conn, $sql);
        header("Location: chinhsua.php");      
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thêm user</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hover.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
</head>

<body>
    <form action="insert_user.php" class="insert_user" method="post">
       <h1>INSERT USER</h1>
        <label for="id">ID</label><input type="text" id="id" name="id" required="required">
        <label for="name">TÊN</label><input type="text" id="name" name="name" required="required">
        <label for="pass">PASSWORD</label><input type="password" id="pass" name="password" required="required">
        <button type="submit" name="submit">ĐĂNG KÝ</button>
    </form>
</body>

</html>
