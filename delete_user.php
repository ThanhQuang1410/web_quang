<?php
    include("connect.php");

    $userId = $_GET['p'];
    $sql = "DELETE FROM user WHERE id='$userId'";
    $product = mysqli_query($conn, $sql);
    header("Location: chinhsua.php");
?>