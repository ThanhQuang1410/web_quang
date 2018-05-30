<?php
    include("connect.php");

    $userId = $_GET['id'];
    $userName = $_GET['n'];
    $userPassword = $_GET['p'];


    if(isset($_POST['submit'])){
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['password'])){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        $sql = "UPDATE user SET id = '$id', name= '$name', password = '$password' WHERE id = '$userId'";
        $user = mysqli_query($conn, $sql);
        header("Location: chinhsua.php");      
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sửa user</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hover.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
</head>

<body>
    <form action="edit_user.php?id=<?php echo $userId; ?>&n=<?php echo $userName; ?>&p=<?php echo $userPassword; ?>" class="edit_user" method="post">
       <h1>EDIT USER</h1>
        <label for="id">ID</label><input type="text" id="id" name="id" value="<?php echo $userId ?>">
        <label for="name">TÊN</label><input type="text" id="name" name="name" value="<?php echo $userName ?>">
        <label for="pass">PASSWORD</label><input type="password" id="pass" name="password" value="<?php echo $userPassword ?>">
        <button type="submit" name="submit">EDIT</button>
    </form>
</body>

</html>
